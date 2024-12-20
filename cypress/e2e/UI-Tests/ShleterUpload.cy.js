import 'cypress-file-upload';

describe('User Login and Upload Flow', () => {

    it('should login successfully and upload the form', () => {
        // Step 1: Login
        cy.visit('http://localhost/userhandle/login.php');
        
        // Fill in the email
        cy.get('#email_value').type('a@a'); // Replace with a valid test email

        // Fill in the password
        cy.get('#passwd_value').type('aladartest'); // Replace with a valid test password

        // Submit the form
        cy.get('button[name="userlogin"]').click({ force: true });

        // Assert success message appears
        cy.contains('Sikeres bejelentkezés').should('be.visible'); // Check for success text

        // Step 2: Navigate to the upload page
        cy.get('body > nav > div.nav-links > a:nth-child(3)').click();

        // Step 3: Upload the image
        const imagePath = '/../../files/img/SPEEDY2-768x1253.jpg'; // Relative path inside cypress/fixtures
        cy.get('input[type="file"]#image-upload').attachFile(imagePath);

        // Step 4: Fill out the remaining form fields
        cy.get('input[name="shelter_name"]').type('Menhely Test'); // Fill out the shelter name
        cy.get('input[name="city"]').type('Budapest'); // Fill out the city
        cy.get('textarea[name="description"]').type('Ez egy teszt menhely leírása.'); // Fill out the description

        // Step 5: Submit the form
        cy.get('input[type="submit"][name="submit"]').click();

        // Step 6: Assert form submission success
        // Adjust this assertion to match the expected success message or behavior after form submission
        cy.contains('hozzáadva').should('be.visible'); // Replace with the actual success message on your page
    });

});
