<?php require_once _ROOTPATH_.'/templates/header.php'; 
/* @var $book \App\Entity\book*/ 
?>
 
<h1><?=$book->getTitle(); ?></h1>
<p><?=$book->getDescription(); ?></p>

<?php require_once _ROOTPATH_.'/templates/footer.php'; ?>