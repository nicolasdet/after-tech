
	@product
	Feature: product
		vérifie qu'un user logged peut commander un produit


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
		Scenario: command product 
			Given I am on the homepage
			Then I should see "Application de Test"
			And I Wait for 1 segonds
			And I click the "#sign_in_btn" element
			And I Wait for 1 segonds
			And I fill in "login" with "test"
			And I fill in "password" with "test"
			And I click the "#valider_inscription" element
			When I press "button-Professionnel"
			And I Wait for 1 segonds
			And I press "btn-command"
			Then I should see "bravo, votre produit a bien ete ajouter au panier"

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