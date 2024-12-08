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

        // Submit the form
        cy.get('button[name="regist"]').click();

        // Assert successful registration
        // This depends on your application's behavior after registration.
        // Example: check for a success message or redirection to a specific URL.
        cy.url().should('not.include', '/register'); // Ensure the URL changes
        cy.contains('Successful registration!').should('exist'); // Example success message
    });
});
describe('Registration Form Test', () => {
    beforeEach(() => {
        // Visit the registration page before each test
        cy.visit('http://localhost/userhandle/register');
    });

    it('Should fail registration if username already exists', () => {
        // Input adatok a formba
        cy.get('#email_value').type('testuser@example.com');
        cy.get('#username_value').type('TestUser');
        cy.get('#passwd1_value').type('StrongPassword123');
        cy.get('#passwd2_value').type('StrongPassword123');

        // Form elküldése
        cy.get('button[name="regist"]').click();

        // Ellenőrzés: hibaszöveg látható-e
        cy.contains('Username already exists.').should('be.visible');
    });
});
