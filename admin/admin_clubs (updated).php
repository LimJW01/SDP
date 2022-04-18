<?php
include_once "includes/header.php";
?>
<main id="main">
    <h1 class="title">Clubs</h1>
    <br>
    <hr>
    <article id="clubs">
        <div class="grid-container">
            <?php $sql = "SELECT * FROM clubs ORDER BY Name ASC";
                $result = $conn->query($sql);
                $result_check = mysqli_num_rows($result);
                ?>
            <?php if ($result_check > 0) : ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <a href="admin_specific_club.php?club=<?php echo $row['Name']; ?>">
                <div class='grid-item'>
                    <div class="img-container">
                        <img title="<?php echo $row['Name']; ?>"
                            src="data:image/jpeg;base64,<?php echo base64_encode($row['Image']); ?>" alt='club_image'>
                    </div>
                    <h2><?php echo $row['Name']; ?></h2>
                </div>
            </a>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </article>

    <?php
include_once "includes/footer.php";
?>