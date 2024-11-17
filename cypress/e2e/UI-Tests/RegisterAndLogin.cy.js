describe('User Registration Test', () => {
  beforeEach(() => {
      // Visit the registration page before each test
      cy.visit('http://localhost');
  });

  it('should visit the registration page', () => {
      cy.visit(`http://localhost/userhandle/register.php`);
  });

  it('should fill out the registration form', () => {
    cy.visit(`http://localhost/userhandle/register.php`);
      cy.get('#email_value').type('testuser@example.com'); // Email
      cy.get('#username_value').type('testuser');          // Username
      cy.get('#passwd1_value').type('TestPassword123');    // Password
      cy.get('#passwd2_value').type('TestPassword123');    // Confirm Password
      cy.get('#type').select('User');   
      it('should submit the registration form', () => {
        cy.get('button[name="regist"]').click();
    });
  });


  it('should assert registration success and redirect', () => {
      // Assume success redirects to another page
      cy.url().should('not.include', '/register.php');
      cy.contains('Kijelentkezés').click(); // Assuming this is the logout button after registration
  });
});

describe('User Login Flow', () => {

  beforeEach(() => {
    // Visit the registration page before each test
    cy.visit('http://localhost/userhandle/login.php');
});

  it('should visit the login page', () => {
      cy.visit('http://localhost/userhandle/login.php'); // Visit the login page
  });

  it('should fill out the login form with valid credentials', () => {
      cy.get('#email_value').type('testuser@example.com'); // Enter Email
      cy.get('#passwd_value').type('TestPassword123');    // Enter Password
  });

  it('should submit the login form', () => {
      // Submit the form
      cy.get('button[name="userlogin"]').click();
  });

  it('should wait for page reload and assert URL change', () => {
      // Wait for the page to finish loading (or specific network request to complete)
      cy.url().should('not.include', '/login.php'); // Check that the URL changes after login
  });

  it('should assert that the user is redirected to the dashboard', () => {
      cy.get('.container').should('exist'); // Ensure the user is redirected to the dashboard
  });

});


