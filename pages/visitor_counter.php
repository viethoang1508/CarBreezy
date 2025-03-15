<?php
    session_start();
    $counter_file = '../includes/counter.txt';
    
    if (!file_exists($counter_file)) {
        file_put_contents($counter_file, "0");
    }
    
    $visitor_count = (int) file_get_contents($counter_file);
    
    if (!isset($_SESSION['visited'])) {
        $_SESSION['visited'] = true;
        $visitor_count++;
        file_put_contents($counter_file, $visitor_count);
    }
?>
<div class="visitor-counter">
    <p>Visitors: <?php echo $visitor_count; ?></p>
</div>
<style>
    .visitor-counter {
        position: absolute;
        top: 10px;
        right: 20px;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-weight: bold;
    }
</style>
