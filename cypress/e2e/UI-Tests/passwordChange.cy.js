describe('User Login and Upload Flow', () => {

    it('should login successfully and change the password', () => {
        // Step 1: Login
        cy.visit('http://localhost/userhandle/login.php');
        
        // Fill in the email
        cy.get('#email_value').type('a@a'); // Replace with a valid test email

        // Fill in the password
        cy.get('#passwd_value').type('a'); // Replace with a valid test password

        // Submit the form
        cy.get('button[name="userlogin"]').click({ force: true });

        // Assert success message appears
        cy.contains('Sikeres bejelentkezés').should('be.visible'); // Check for success text

        // Step 2: Navigate to the upload page
        cy.get('body > nav > div.nav-links > a:nth-child(4)').click();

        cy.get('body > main > div.container-profile > div > form:nth-child(2) > input').type('aladartest');

        cy.get('button[name="passwordupdate"').click();

    });

    it('check if the password is working', () => {
        // Step 1: Login
        cy.visit('http://localhost/userhandle/login.php');
        
        // Fill in the email
        cy.get('#email_value').type('a@a'); // Replace with a valid test email

        // Fill in the password
        cy.get('#passwd_value').type('aladartest'); // Replace with a valid test password

        // Submit the form
        cy.get('button[name="userlogin"]').click({ force: true });

        // Assert success message appears
        cy.contains('Sikeres bejelentkezés').should('be.visible');



    });

});