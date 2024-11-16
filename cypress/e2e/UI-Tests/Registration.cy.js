describe('Registration Form Test', () => {
  beforeEach(() => {
    // Visit the registration page before each test
    cy.visit('http://localhost/userhandle/register');
  });

  it('Should fill the registration form and submit', () => {
    // Fill the form with relevant data
    cy.get('#email_value').type('testuser@example.com'); // Email
    cy.get('#username_value').type('TestUser');          // Username
    cy.get('#passwd1_value').type('StrongPassword123');  // Password
    cy.get('#passwd2_value').type('StrongPassword123');  // Confirm Password
    cy.get('#type').select('User');                      // Select User type

    // Submit the form
    cy.get('button[name="regist"]').click();

    // Assert successful registration
    // This depends on your application's behavior after registration.
    // Example: check for a success message or redirection to a specific URL.
    cy.url().should('not.include', '/register'); // Ensure the URL changes
    cy.contains('Registration successful').should('exist'); // Example success message
  });
});
