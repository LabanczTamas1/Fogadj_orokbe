describe('Registration and Login Test', () => {
    beforeEach(() => {
        // Visit the registration page before each test
        cy.visit('http://localhost');
      });
  
    it('should register a new user and log in successfully', () => {
      // Step 1: Visit the registration page
      cy.visit(`http://localhost/userhandle/register.php`);
  
      // Step 2: Fill out the registration form
      cy.get('#email_value').type('testuser@example.com'); // Email
      cy.get('#username_value').type('testuser');          // Username
      cy.get('#passwd1_value').type('TestPassword123');    // Password
      cy.get('#passwd2_value').type('TestPassword123');    // Confirm Password
      cy.get('#type').select('User');                     // User Type (User)
  
      // Step 3: Submit the registration form
      cy.get('button[name="regist"]').click();
  
      // Step 4: Assert registration success
      // Update this assertion based on your app's behavior
      cy.url().should('not.include', '/register.php'); // Assume success redirects to another page
  
      // Step 5: Visit the login page
      cy.visit(`http://localhost/userhandle/login.php`);
  
      // Step 6: Fill out the login form
      cy.get('#email_value').type('testuser@example.com'); // Email
      cy.get('#passwd_value').type('TestPassword123');    // Password
  
      // Step 7: Submit the login form
      cy.get('button[name="userlogin"]').click();
  
      // Step 8: Assert login success
      // Update this assertion based on your app's behavior
      cy.get('.container-choose').should('exist');
    });
  });
  