$(document).ready(function() {


	//  <--- changePassword form--->
	$('#changePassword').formValidation({
		framework: 'bootstrap',
		icon: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			nickname: {
				validators: {
					notEmpty: {
						message: "Tu dois retrouver ton pseudo avant de répondre à la question secrète"
					}
				}
			},
			answerQuestion: {
				validators:{
					notEmpty:{
						message: "Tu dois répondre à la question secrète - indice: un seul mot"
					}
				}
			},
			password: {
				validMessage: 'The password is good',
				validators: {
					notEmpty: {
						message: 'Choisis un mot de passe'
					},
					different: {
						field: 'nickname',
						message: "Ce n'est pas une bonne idée d'utiliser ton pseudo comme mot de passe, choisis autre chose :-)"
					},
					callback: {
						callback: function(value, validator, $field) {
							var password = $field.val();
							if (password == '') {
								return true;
							}

							var result  = zxcvbn(password),
							score   = result.score,
							message = "Tu n'as pas lu nos conseils ;-) Ton mot de passe est trop simple, utilise majuscules/ponctuation et chiffres";

							var $bar = $('#strengthBar');
							switch (score) {
								case 0:
								$bar.attr('class', 'progress-bar progress-bar-danger')
								.css('width', '1%');
								break;
								case 1:
								$bar.attr('class', 'progress-bar progress-bar-danger')
								.css('width', '25%');
								break;
								case 2:
								$bar.attr('class', 'progress-bar progress-bar-success') //afficher warning?? - orange-
								.css('width', '50%');
								break;
								case 3:
								$bar.attr('class', 'progress-bar progress-bar-success')
								.css('width', '75%');
								break;
								case 4:
								$bar.attr('class', 'progress-bar progress-bar-success')
								.css('width', '100%');
								break;
							}

							if (score < 1) {
								return {
									valid: false,
									message: message
								}
							}

							return true;
						}
					}
				}
			}
		}
	});

	//afficher question secrète en fonction du pseudo entré
	$("#secreteQ").hide();

	$("#showQuestion").on('click', function() {
		$('#secreteQ').show('slow');
		var val = $('#changePassword #pseudo').val();
		$.getJSON('/secretQuestion/getSecretQuestion/'+ val, function(data) {
			console.log(data);
			$('#secreteQuestion').attr("placeholder", data.name);
		});
	});



	//  <--- addDomain form--->
	$('#addDomain').formValidation({
		framework: 'bootstrap',
		icon: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			newDomain: {
				validators: {
					notEmpty: {
						message: "Merci de définir un domaine (sous-domaine, domaine)"
					},
					remote: {
						message: 'Le domaine existe déjà',
						url: function(validator, $field, value) {
							return '/domain/domainCheck/' + '{'+ value +'}';
						},
						type: 'GET',
						delay: 500
					}
				}
			},
			description: {
				validators: {
					notEmpty: {
						message: "Merci de définir une description pour le domaine"
					}
				}
			},
			isDomain: {
				validators: {
					notEmpty: {
						message: "Merci de définir une description pour le domaine"
					}
				}
			}
		}
	});

	//gestion de l'affichage du imput choix sous-domaine

	$('.sub').hide('slow');

	$('#subYes').on('click', function() {
		$('.sub').hide('slow');
	});

	$('#subNo').on('click', function() {
		$('.sub').show('slow');
	});




	//  <--- validate Topic form --->
	$('#validateTopic').formValidation({
		framework: 'bootstrap',
		icon: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			category: {
				validators: {
					notEmpty: {
						message: "Merci de préciser une catégorie à la discussion"
					}
				}
			},
			validateStatus: {
				validators: {
					notEmpty: {
						message: "Un status de validation doit être défini pour cette discussion"
					}
				}
			}
		}
	});

	$('.reason').hide();

	$('#non').click(function(){
		$('.reason').show('slow');
	})

	$('#oui').click(function(){
		$('.reason').hide('slow');
	})

	//  <--- addTopic form --->
	$('#proposeTopic').formValidation({
		framework: 'bootstrap',
		icon: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			category: {
				validators: {
					notEmpty: {
						message: "De quoi veux-tu parler? N'oublie pas de préciser une catégorie à la discussion"
					}
				}
			},
			topicName: {
				validators: {
					notEmpty: {
						message: "Pense aux autres ;-) Indique un nom de discussion"
					}
				}
			},
			topicPost: {
				validators: {
					notEmpty: {
						message: "Pour lancer une discussion, sois le premier à parler ;-) Rédige ton message pour cette discussion"
					},
					stringLength: {
						min: 15,
						message: "Ton message est trop court, soit un peu plus complet ;-)"
					},
				}
			}
		}
	});

	//Gestion réponse à un post dans un topic
	$('.answerTo').on('click', function(event) {
		event.preventDefault();
		var name = $(this).data('nickname');
		$('#messageForum').val('@' + name + ': ');
		$('#messageForum').focus();
	});


	//  <--- addQuestion form (client) --->
	$('#addQuestion').formValidation({
		framework: 'bootstrap',
		icon: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			domain: {
				validators: {
					notEmpty: {
						message: "De quoi veux-tu parler? Tu dois indiquer une catégorie à ta question"
					}
				}
			},
			content: {
				validators: {
					notEmpty: {
						message: "Tu dois écrire ta question avant de la poser :-)"
					},
					stringLength: {
						min: 25,
						message: "Ta question est trop courte, peux-tu développer?"
					},
				}
			}
		}
	});

	//Peupler drop-down list domain / sous-domaine
	$domain = $("select[name='domain']");
	$subDomain = $("select[name='subDomain']");

	$domain.on('change', function(event) {
		event.preventDefault();
		$subDomain.empty();
		$subDomain.append("<option disabled selected value> Tu peux préciser une sous-catégorie </option>");
		$.getJSON('/domain/getSubDomains/' + $domain.val(), function(data) {
			//$subDomain.empty();
			for (var i = 0; i < data.length; i++) {
				$subDomain.append("<option value="+ data[i].id +">" + data[i].name + "</option>");
			};
			$('#theme').focus();
		});
	});


	//  <--- answerQuestion form --->
	$('#answerQuestion').formValidation({
		framework: 'bootstrap',
		icon: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			theme: {
				validators: {
					notEmpty: {
						message: "Merci d'indiquer un thème précis"
					}
				}
			},
			titleQuestion: {
				validators: {
					notEmpty: {
						message: "Merci de préciser un titre court et clair à la question"
					}
				}
			},
			answerQuestion: {
				validators: {
					notEmpty: {
						message: "Merci de rédiger une réponse à la question"
					}
				}
			}
		}
	});



	//  <--- SignIn form --->
	$('#signin').formValidation({
		framework: 'bootstrap',
		excluded: ':disabled',
		icon: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			username: {
				validators: {
					notEmpty: {
						message: "Ciao, moi c'est Gustave et toi ton pseudo c'est quoi? ;-)"
					},
					stringLength: {
						min: 6,
						max: 30,
						message: "Ton pseudo doit être constitué de 6 à 30 caractères"
					},
					regexp: {
						regexp: /^[a-zA-Z0-9_]+$/,
						message: "Ton pseudo ne doit être constitué que de lettres, chiffres et underscores '_'"
					}
				}
			},
			password: {
				validators: {
					notEmpty: {
						message: "Et tu crois pouvoir entrer sans ton mot de passe? ;-)"
					}
				}
			}
		}
	});

	//  <--- registrationForm --->

	$('#registrationForm').formValidation({
		framework: 'bootstrap',
		icon: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			pseudo: {
				threshold: 3,
				validators: {
					notEmpty: {
						message: "Ciao, moi c'est Gustave et toi ton pseudo c'est quoi? ;-)"
					},
					stringLength: {
						min: 6,
						max: 30,
						message: "Ton pseudo doit être constitué de 6 à 30 caractères"
					},
					regexp: {
						regexp: /^[a-zA-Z0-9_]+$/,
						message: "Ton pseudo ne doit être constitué que de lettres, chiffres et underscores '_'"
					},
					remote: {
						message: 'Le pseudo est déjà utilisé',
						url: function(validator, $field, value) {
							return '/user/nicknameCheck/' + value;
						},
						type: 'GET',
						delay: 500
					}
				}
			},
			password: {
				validMessage: 'Bravo champion!',
				validators: {
					notEmpty: {
						message: 'Choisis un mot de passe'
					},
					different: {
						field: 'pseudo',
						message: "Ce n'est pas une bonne idée d'utiliser ton pseudo comme mot de passe, choisis autre chose :-)"
					},
					callback: {
						callback: function(value, validator, $field) {
							var password = $field.val();
							if (password == '') {
								return true;
							}

							var result  = zxcvbn(password),
							score   = result.score,
							message = "Tu n'as pas lu nos conseils ;-) Ton mot de passe est trop simple, utilise majuscules/ponctuation et chiffres";

							var $bar = $('#strengthBar');
							switch (score) {
								case 0:
								$bar.attr('class', 'progress-bar progress-bar-danger')
								.css('width', '1%');
								break;
								case 1:
								$bar.attr('class', 'progress-bar progress-bar-danger')
								.css('width', '25%');
								break;
								case 2:
								$bar.attr('class', 'progress-bar progress-bar-success') //afficher warning?? - orange-
								.css('width', '50%');
								break;
								case 3:
								$bar.attr('class', 'progress-bar progress-bar-success')
								.css('width', '75%');
								break;
								case 4:
								$bar.attr('class', 'progress-bar progress-bar-success')
								.css('width', '100%');
								break;
							}

							if (score < 1) {
								return {
									valid: false,
									message: message
								}
							}

							return true;
						}
					}
				}
			},
			confirmPassword: {
				validators: {
					notEmpty: {
						message: 'Par sécurité, réécris ton mot de passe'
					},
					identical: {
						field: 'password',
						message: "Ton mot de passe n'est pas identique"
					}
				}
			},
			birth: {
				validators: {
					notEmpty: {
						message: "Quel âge as-tu? Merci d'indiquer ton année de naissance"
					},
					between: {
						message: "Ton année de naissance doit suivre le format AAAA, par exemple 1995",
						min: 1920,
						max:2017
					}
				}
			},
			country: {
				validators: {
					notEmpty: {
						message: "Tu dois spécifier un canton/pays"
					}
				}
			},
			sex: {
				validators: {
					notEmpty: {
						message: 'Fille ou Garçon? Tu devrais pouvoir répondre à la question ;-)'
					}
				}
			},
			secretQuestion: {
				validators: {
					notEmpty: {
						message: "Choisis une question secrète que l'on te posera en cas d'oublie de ton mot de passe"
					}
				}
			},
			answerQuestion: {
				validators: {
					notEmpty: {
						message: "Il n'y a pas de questions sans réponses sur notre site, indique donc celle à ta question secrète aussi ;-)"
					},
					stringLength: {
						min: 3,
						max: 15,
						message: "Ta réponse secrète ne doit contenir qu'un seul mot entre 3 et 15 caractères"
					},
					regexp: {
						regexp: /^\S*$/,
						message: "Ta réponse doit être constituée que d'un seul mot"
					}
				}
			},
			agree: {
				excluded: false,
				validators: {
					callback: {
						message: "Tu dois accepter les conditions d'utilisations de Ciao",
						callback: function(value, validator, $field) {
							return value === 'yes';
						}
					}
				}
			}
		}
	});

	$('#agreeButton, #disagreeButton').on('click', function() {
		var whichButton = $(this).attr('id');

		$('#registrationForm')
		.find('[name="agree"]')
		.val(whichButton === 'agreeButton' ? 'yes' : 'no')
		.end()

		.formValidation('revalidateField', 'agree');
	});


});
