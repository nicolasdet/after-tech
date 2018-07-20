	


	@user
	Feature: user
		permet de vérifier qu'un user peut s'authentifier et les fonctionnalitée user
		par defaut le user est Test + Test. si il existe pas executer le basic.feature qui le créera. 


		Scenario: Homepage
			Given I am on the homepage
			Then I should see "Application de Test"

		@javascript
		Scenario: go to connexion
			Given I am on the homepage
			Then I should see "Application de Test"
			And I Wait for 1 segonds
			And I click the "#sign_in_btn" element
			And I Wait for 1 segonds
			Then I should see "ce connecter"

		@javascript
		Scenario: connexion : validate empty form
			Given I am on the homepage
			Then I should see "Application de Test"
			And I Wait for 1 segonds
			And I click the "#sign_in_btn" element
			And I Wait for 1 segonds
			And I click the "#valider_inscription" element
			Then I should see "erreur, le formulaire est mal remplis."

		@javascript
		Scenario:  connexion : try bad login or password
			Given I am on the homepage
			Then I should see "Application de Test"
			And I Wait for 1 segonds
			And I click the "#sign_in_btn" element
			And I Wait for 1 segonds
			And I fill in "login" with "mauvaislogin00"
			And I fill in "password" with "mauvaispassword00"
			And I click the "#valider_inscription" element
			And I Wait for 1 segonds
			Then I should see "erreur, le login ou le mot de passe est faux."

		@javascript
		Scenario:  connexion : try good login or password
			Given I am on the homepage
			Then I should see "Application de Test"
			And I Wait for 1 segonds
			And I click the "#sign_in_btn" element
			And I Wait for 1 segonds
			And I fill in "login" with "test"
			And I fill in "password" with "test"
			And I click the "#valider_inscription" element
			Then I should not see "Sign up"
			Then I should not see "Sign in"
			Then I should see "Ce déconnecter"

		@javascript
		Scenario:  disconnect
			Given I am on the homepage
			Then I should see "Application de Test"
			And I Wait for 1 segonds
			And I click the "#sign_in_btn" element
			And I Wait for 1 segonds
			And I fill in "login" with "test"
			And I fill in "password" with "test"
			And I click the "#valider_inscription" element
			And I click the "#deconnect" element
			Then I should see "Sign up"
			Then I should see "Sign in"




			
			