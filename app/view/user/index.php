<?php require APPROOT . '/view/includes/header.php'; ?>

<h1><?php echo $data['text']; ?></h1>
<ul>
<?php foreach ($data['users'] as $user): ?>

    <li><?php echo $user->name ?></li>

<?php endforeach ?>
</ul>
<?php require APPROOT . '/view/includes/footer.php'; ?>


