<?php

namespace App\Jobs;

use App\Models\AdImage;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class GoogleVisionRemoveFaces implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $ad_image_id;

    public function __construct($ad_image_id)
    {
        $this->ad_image_id = $ad_image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $i = AdImage::find($this->ad_image_id);

        if(!$i){return; }

        //imposta la variabile di ambiente GOOGLE_APPLICATION_CREDENTIALS
        //al path del credentials file

        $srcPath = storage_path('/app/' . $i->file);
        $image = file_get_contents($srcPath);
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));


        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->faceDetection($image);
        $faces = $response->getFaceAnnotations();

        foreach ($faces as $face) {
           $vertices = $face->getBoundingPoly()->getVertices();

           $bounds= [];
           foreach ($vertices as $vertex) {
               $bounds[] = [$vertex->getX(), $vertex->getY()];
           }

           $width = $bounds[2][0] - $bounds[0][0];
           $height = $bounds[2][1] - $bounds[0][1];

           $image = Image::load($srcPath);

           $image->watermark(base_path('public/image/smile.jpg'))
                ->watermarkPosition('top-left')
                ->watermarkPadding($bounds[0][0], $bounds[0][1])
                ->watermarkWidth($width, Manipulations::UNIT_PIXELS)
                ->watermarkHeight($height, Manipulations::UNIT_PIXELS)
                ->watermarkFit(Manipulations::FIT_STRETCH);

           $image->save($srcPath);
        }
        $imageAnnotator->close();
    }
}
