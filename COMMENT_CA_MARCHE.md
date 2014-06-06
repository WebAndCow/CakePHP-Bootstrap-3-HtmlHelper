# BsHelper

BsHelper::modal(string $header, string $body, array $options = array(), array $buttons = array())

_param string $header_ :
Contenu de l'en-tête
_param string $body_ :
Contenu du corps
_param array $options_ :
Tableau indiquant l'ID du modal, classes supplémentaires et la présence ou non dans un formulaire.
_param array $buttons_ :
Tableau caractérisant les 3 boutons du modal.

Créer un modal de Bootstrap :

		echo $this->Bs->modal('Mon en-tête', 'Mon contenu');

Crée une modal simple sans bouton close et confirm.

Pour personnalisé vos boutons, utilisez le tableau $buttons :

		$this->Bs->modal(
			'Mon en-tête',
			'Mon contenu',
			array(
				'id' => 'abc123',
				'class' => 'modal-form',
			),
			array(
				'open' => array(
					'name' => 'S'inscrire',
					'class' => 'btn-success'
					),
				'close' => array(
					'name' => 'Annuler',
					'class' => 'btn-link'
					),
				'confirm' => array(
					'name' => 'Confirmer',
					'link' => array(
						'controller' => 'monController',
						'action' => 'monAction'
					),
					'class' => 'btn-success'
				)
			)
		);

Si vous voulez naviguer en dehors du projet en cliquant sur le bouton confirmer, utilisez une URL absolue à la place du tableau de CakePHP.

Pour insérer un formulaire dans le body :

		$this->Bs->modal('Mon en-tête', $form);

La variable $form désigne ici le code HTML de votre formulaire.


BeHelper::alert(string $text, string $state, array $options = array())

$text : Définit le contenu de l'alerte.
$state : L'état bootrstrap de l'alerte.
$options : Tableau d'options caractérisant l'alerte.

		$this->Bs->alert('monTexte', 'warning');

Donnera :

		'<div  class="alert alert-warning" style="display:none;"> monTexte </div>'

Le tableau $options prend des attributs HTML classiques, mais aussi l'index 'dismiss' (true/false) pour définir si l'alerte peut être fermée ou non. Par défaut à true.

		$this->Bs->alert('monTexte', 'warning', array('dismiss' => 'true', 'id' => 'monId', 'style' => 'color:purple	;'));