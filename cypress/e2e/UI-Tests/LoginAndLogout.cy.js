describe('User Login and Logout Flow', () => {

    it('should login successfully and upload the form', () => {
        // Step 1: Login
        cy.visit('http://localhost/userhandle/login.php');

        // Fill in the email
        cy.get('#email_value').type('admin@admin'); // Replace with a valid test email

        // Fill in the password
        cy.get('#passwd_value').type('admin'); // Replace with a valid test password

        // Submit the form
        cy.get('button[name="userlogin"]').click({ force: true });

        // Assert success message appears
        cy.contains('Sikeres bejelentkezés').should('be.visible'); // Check for success text
        cy.visit('http://localhost/');
        cy.get('body > nav > div.nav-links > a:nth-child(5)').click();
        cy.contains('Sikeresen kijelentkezett!').should('be.visible');
    })
});
