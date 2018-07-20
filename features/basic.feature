

	@core
	Feature: basic
		Permet de vérifier que les page de base s'affichent correctement et l'inscription d'un user.
		ps: il faut vider la bdd sinon les insértion en base peuvent étre fausser !


		Scenario: Homepage
			Given I am on the homepage
			Then I should see "Application de Test"

		@javascript
		Scenario: show product	( professionnel )
			Given I am on the homepage
			Then I should see "Application de Test"
			When I press "button-Professionnel"
			And I Wait for 1 segonds
			Then I should see "Commander ce produit"
			Then I should see "Professionnel"

		@javascript
		Scenario: command product without connexion
			Given I am on the homepage
			Then I should see "Application de Test"
			When I press "button-Professionnel"
			And I Wait for 1 segonds
			And I press "btn-command"
			Then I should see "erreur vous devez vous authentifier avant de commander un produit"

		@javascript
		Scenario: on delete le user test pour que la suite du sénario est du sens
			Given I am on the homepage
			Then I go to "http://apirest.fr/create/delete"

		@javascript
		Scenario: go on page sign up 
			Given I am on the homepage
			Then I should see "Application de Test"
			And I Wait for 1 segonds
			And I click the "#sign_up_btn" element
			And I Wait for 1 segonds
			Then I should see "crée un compte"

		@javascript
		Scenario: go on page sign up & validate empty form
			Given I am on the homepage
			Then I should see "Application de Test"
			And I Wait for 1 segonds
			And I click the "#sign_up_btn" element
			And I Wait for 1 segonds
			And I click the "#valider_inscription" element
			Then I should see "erreur le formulaire est mal remplis"

		@javascript
		Scenario: go on page sign up & validate good form
			Given I am on the homepage
			Then I should see "Application de Test"
			And I Wait for 1 segonds
			And I click the "#sign_up_btn" element
			And I Wait for 1 segonds
			And I fill in "login" with "test"
			And I fill in "password" with "test"
			And I click the "#valider_inscription" element
			Then I should not see "erreur le formulaire est mal remplis"
			Then I should see "Bravo vous avez créer un compte"

		@javascript
		Scenario: go on page sign up & validate good form (segond time -- login already use)
			Given I am on the homepage
			Then I should see "Application de Test"
			And I Wait for 1 segonds
			And I click the "#sign_up_btn" element
			And I Wait for 1 segonds
			And I fill in "login" with "test"
			And I fill in "password" with "test"
			And I click the "#valider_inscription" element
			Then I should not see "erreur le formulaire est mal remplis"
			Then I should see "erreur le login est deja utilisé"

		@javascript
		Scenario: go on page sign up & validate less than 3char login & password
			Given I am on the homepage
			Then I should see "Application de Test"
			And I Wait for 1 segonds
			And I click the "#sign_up_btn" element
			And I Wait for 1 segonds
			And I fill in "login" with "te"
			And I fill in "password" with "te"
			And I click the "#valider_inscription" element
			Then I should not see "erreur le formulaire est mal remplis"
			Then I should see "erreur 3 charractere minnimum "