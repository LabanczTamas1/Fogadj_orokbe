import 'cypress-file-upload';

describe('User Login and Upload Flow', () => {

    it('should login successfully and upload the form', () => {
        // Step 1: Login
        cy.visit('http://localhost/userhandle/login.php');
        
        // Fill in the email
        cy.get('#email_value').type('wq@wq'); // Replace with a valid test email

        // Fill in the password
        cy.get('#passwd_value').type('wq'); // Replace with a valid test password

        // Submit the form
        cy.get('button[name="userlogin"]').click({ force: true });

        // Assert success message appears
        cy.contains('Sikeres bejelentkezés').should('be.visible'); // Check for success text

        // Step 2: Navigate to the upload page
        cy.get('body > nav > div.nav-links > a:nth-child(1)').click();

        cy.get('body > main > div > a:nth-child(2)').click();

        cy.get('body > main > form > div > div.container-pet > div:nth-child(3) > div > div.linky-pet > button').click();



        //body > main > form > div > input:nth-child(5)
        // Step 4: Fill out the remaining form fields
        cy.get('textarea[name="message"]').type('Teszt Elek'); // Fill out the shelter name

        // Step 5: Submit the form
        cy.get('input[type="submit"][name="submit"]').click();

        // Step 6: Assert form submission success
        // Adjust this assertion to match the expected success message or behavior after form submission
        cy.contains('hozzáadva').should('be.visible'); // Replace with the actual success message on your page
    });

});
