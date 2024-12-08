describe('User Login Flow - Prevent Login with Nonexistent User', () => {

    beforeEach(() => {
      // Visit the login page before each test
      cy.visit('http://localhost/userhandle/login.php');
    });

    it('should visit the login page', () => {
      cy.visit('http://localhost/userhandle/login.php');
    });

    it('should attempt to login with invalid credentials', () => {
      // Fill out the form with invalid user credentials
      cy.get('#email_value').type('nonexistentuser@example.com'); // Non-existent Email
      cy.get('#passwd_value').type('password123'); // Any Password

      // Submit the login form
      cy.get('button[name="userlogin"]').click({ force: true });

      // Assert that user is not redirected, and error is shown
      cy.url().should('include', '/'); 
      cy.contains('Nincsen ilyen felhasználó!').should('be.visible'); // Error message check
    });
  });