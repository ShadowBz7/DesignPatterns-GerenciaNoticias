<?php
// Array of YouTube video links
$video_links = array(
    "https://www.youtube.com/embed/E8PO6sG1Xew?si=CTIWVV5lo_CuLJWV",
    "https://www.youtube.com/embed/iIgqv0AKPPQ?si=TTrOFmGZQd6v1tWn",
    "https://www.youtube.com/embed/H1I2h65UnCA?si=D_ivIAC1443o1KHp",
    "https://www.youtube.com/embed/jZnaJAlCzGE?si=WdffTwFFJT-_-NFs",
    "https://www.youtube.com/embed/M9IMZoNM6jY?si=HGYQ3Ae3cyVhGrJQ"

);

// Get a random video link from the array
$random_video_link = $video_links[array_rand($video_links)];
?>

<div class="card-mb-4">
    <div class="card-header">Ads</div>
    <div class="card-body">
        <iframe width="100%" height="200" style="max-height: 200px;" src="<?php echo $random_video_link; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
</div>
