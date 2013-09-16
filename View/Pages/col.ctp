<?php 

// Exemple de colonnes :

// 2 par rangées en format 'xs'
// 3 par rangées en format 'sm'
// 4 par rangées en format 'md'
// 6 par rangées en format 'lg'

echo '<h1>Utilisation basique</h1>'.

BR.

$this->Bs->container(array('style' => 'border:1px solid #666;background:#ecf0f1;')).
	'<p>Container</p>'.
	$this->Bs->row(array('style' => 'border:1px solid #34495e;background:#95a5a6;')).
	  '<p>Row</p>'.
      $this->Bs->col('xs6', 'sm4', 'md3', 'lg2', array('style' => 'border:1px solid #2c3e50;background:#7f8c8d;padding:5px;')).
      	'<span>Colonne</span>'.
      $this->Bs->close().
      $this->Bs->col('xs6', 'sm4', 'md3', 'lg2', array('style' => 'border:1px solid #2c3e50;background:#7f8c8d;padding:5px;')).
      	'<span>Colonne</span>'.
      $this->Bs->close().
      $this->Bs->col('xs6', 'sm4', 'md3', 'lg2', array('style' => 'border:1px solid #2c3e50;background:#7f8c8d;padding:5px;')).
      	'<span>Colonne</span>'.
      $this->Bs->close().
      $this->Bs->col('xs6', 'sm4', 'md3', 'lg2', array('style' => 'border:1px solid #2c3e50;background:#7f8c8d;padding:5px;')).
      	'<span>Colonne</span>'.
      $this->Bs->close().
      $this->Bs->col('xs6', 'sm4', 'md3', 'lg2', array('style' => 'border:1px solid #2c3e50;background:#7f8c8d;padding:5px;')).
      	'<span>Colonne</span>'.
      $this->Bs->close().
      $this->Bs->col('xs6', 'sm4', 'md3', 'lg2', array('style' => 'border:1px solid #2c3e50;background:#7f8c8d;padding:5px;')).
      	'<span>Colonne</span>'.
      $this->Bs->close().
    $this->Bs->close().
$this->Bs->close();

echo BR;




// Exemple de colonnes avec offset :

// 2 par rangées en format 'xs'
// 2 par rangées avec un offset de 1 en format 'sm'
// 2 par rangées avec un offset de 2 en format 'md'
// 3 par rangées avec un offset de 1 en format 'lg'

echo '<h1>Utilisation des offsets</h1>'.

BR.

$this->Bs->container(array('style' => 'border:1px solid #666;background:#ecf0f1;')).
	'<p>Container</p>'.
	$this->Bs->row(array('style' => 'border:1px solid #34495e;background:#95a5a6;')).
	  '<p>Row</p>'.
      $this->Bs->col('xs6', 'sm5 of1', 'md4 of2', 'lg3 of1', array('style' => 'border:1px solid #2c3e50;background:#7f8c8d;padding:5px;')).
      	'<span>Colonne</span>'.
      $this->Bs->close().
      $this->Bs->col('xs6', 'sm5 of1', 'md4 of2', 'lg3 of1', array('style' => 'border:1px solid #2c3e50;background:#7f8c8d;padding:5px;')).
      	'<span>Colonne</span>'.
      $this->Bs->close().
      $this->Bs->col('xs6', 'sm5 of1', 'md4 of2', 'lg3 of1', array('style' => 'border:1px solid #2c3e50;background:#7f8c8d;padding:5px;')).
      	'<span>Colonne</span>'.
      $this->Bs->close().
      $this->Bs->col('xs6', 'sm5 of1', 'md4 of2', 'lg3 of1', array('style' => 'border:1px solid #2c3e50;background:#7f8c8d;padding:5px;')).
      	'<span>Colonne</span>'.
      $this->Bs->close().
      $this->Bs->col('xs6', 'sm5 of1', 'md4 of2', 'lg3 of1', array('style' => 'border:1px solid #2c3e50;background:#7f8c8d;padding:5px;')).
      	'<span>Colonne</span>'.
      $this->Bs->close().
      $this->Bs->col('xs6', 'sm5 of1', 'md4 of2', 'lg3 of1', array('style' => 'border:1px solid #2c3e50;background:#7f8c8d;padding:5px;')).
      	'<span>Colonne</span>'.
      $this->Bs->close().
    $this->Bs->close().
$this->Bs->close();

echo BR;




// Exemple de colonnes avec pull et push :

// 2 par rangées en format 'xs'
// Inversion des 2 colonnes en format 'sm'
// Inversion de chaque colonne aux extrémités en format 'md'
// Inversion d'une colonne sur deux en format 'lg'

echo '<h1>Utilisation des push et pull</h1>'.

BR.

$this->Bs->container(array('style' => 'border:1px solid #666;background:#ecf0f1;')).
	'<p>Container</p>'.
	$this->Bs->row(array('style' => 'border:1px solid #34495e;background:#95a5a6;')).
	  '<p>Row</p>'.
      $this->Bs->col('xs6', 'sm6 ph6', 'md4 ph8', 'lg3 ph3', array('style' => 'border:1px solid #2c3e50;background:#7f8c8d;padding:5px;')).
      	'<span>Colonne 1</span>'.
      $this->Bs->close().
      $this->Bs->col('xs6', 'sm6 pl6', 'md4 pl0', 'lg3 pl3', array('style' => 'border:1px solid #2c3e50;background:#7f8c8d;padding:5px;')).
      	'<span>Colonne 2</span>'.
      $this->Bs->close().
      $this->Bs->col('xs6', 'sm6 ph6', 'md4 ph0 pl8', 'lg3 pl0 ph3', array('style' => 'border:1px solid #2c3e50;background:#7f8c8d;padding:5px;')).
      	'<span>Colonne 3</span>'.
      $this->Bs->close().
      $this->Bs->col('xs6', 'sm6 pl6', 'md4 pl0 ph8', 'lg3 ph0 pl3', array('style' => 'border:1px solid #2c3e50;background:#7f8c8d;padding:5px;')).
      	'<span>Colonne 4</span>'.
      $this->Bs->close().
      $this->Bs->col('xs6', 'sm6 ph6', 'md4 ph0', 'lg3 ph3', array('style' => 'border:1px solid #2c3e50;background:#7f8c8d;padding:5px;')).
      	'<span>Colonne 5</span>'.
      $this->Bs->close().
      $this->Bs->col('xs6', 'sm6 pl6', 'md4 pl8', 'lg3 pl3', array('style' => 'border:1px solid #2c3e50;background:#7f8c8d;padding:5px;')).
      	'<span>Colonne 6</span>'.
      $this->Bs->close().
    $this->Bs->close().
$this->Bs->close();
