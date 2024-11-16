describe('Simple API Test', () => {
    const baseUrl = 'http://localhost:80'; // Replace with your backend URL
  
    it('should return a successful response from the ping endpoint', () => {
      cy.request('GET', `${baseUrl}/ping`).then((response) => {
        expect(response.status).to.eq(200);
        expect(response.body).to.have.property('message', 'pong'); // Adjust based on your API's response
      });
    });
  });
  