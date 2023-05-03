<?php
session_start();
$id = $_SESSION['user_id'];
function resizeImage($resourceType, $image_width, $image_height)
{
    $resizeWidth = 100;
    $resizeHeight = 100;
    $imageLayer = imagecreatetruecolor($resizeWidth, $resizeHeight);
    imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $image_width, $image_height);
    return $imageLayer;
}

function secondResizeImage($resourceType, $image_width, $image_height)
{
    $resizeWidth = 50;
    $resizeHeight = 50;
    $imageLayer = imagecreatetruecolor($resizeWidth, $resizeHeight);
    imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $image_width, $image_height);
    return $imageLayer;
}

if (isset($_POST["submit"])) {
    $imageProcess = 0;
    if (is_array($_FILES)) {
        $fileName = $_FILES['file']['tmp_name'];
        $sourceProperties = getimagesize($fileName);
        $resizeFileName = time();
        $uploadPath = "avatars/" . $id . "/";
        $fileExt = "jpg";
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        if (!file_exists('avatars/' . $id)) {
            mkdir('avatars/' . $id, 0777, true);
        }
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName);
                $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                $secondImageLayer = secondResizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                imagejpeg($imageLayer, $uploadPath . $id . '.' . $fileExt);
                imagejpeg($secondImageLayer, $uploadPath . $id . '_50.' . $fileExt);
                break;

            case IMAGETYPE_GIF:
                $resourceType = imagecreatefromgif($fileName);
                $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                $secondImageLayer = secondResizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                imagejpeg($imageLayer, $uploadPath . $id . '.' . $fileExt);
                imagejpeg($secondImageLayer, $uploadPath . $id . '_50.' . $fileExt);
                break;

            case IMAGETYPE_PNG:
                $resourceType = imagecreatefrompng($fileName);
                $imageLayer = resizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                $secondImageLayer = secondResizeImage($resourceType, $sourceImageWidth, $sourceImageHeight);
                imagejpeg($imageLayer, $uploadPath . $id . '.' . $fileExt);
                imagejpeg($secondImageLayer, $uploadPath . $id . '_50.' . $fileExt);
                break;

            default:
                $imageProcess = 0;
                break;
        }
        $imageProcess = 1;
    }

    if ($imageProcess == 1) {
        header("location: profile/avatar.php?upload=success");
    } else {
        header("location: profile/avatar.php?upload=failed");
    }
    $imageProcess = 0;
}