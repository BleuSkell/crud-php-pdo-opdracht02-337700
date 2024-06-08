<?php require APPROOT . '/views/includes/header.php'; ?>

<h3><?= $data['title']; ?></h3>

<table class="table table-hover">
    <thead>
        <th>color1</th>
        <th>color2</th>
        <th>color3</th>
        <th>color4</th>
        <th>phone</th>
        <th>mail</th>
        <th>date</th>
        <th>treatment1</th>
        <th>treatment2</th>
        <th>treatment3</th>
        <th>Update</th>
    </thead>
    <tbody>
        <?= $data['dataRows']; ?>
    </tbody>
</table>

<a href="<?= URLROOT; ?>/Homepages/index">Homepage</a>
<a href="<?= URLROOT; ?>/chantal/index">Maak een nieuwe afspraak</a>

<?php require APPROOT . '/views/includes/footer.php'; ?>