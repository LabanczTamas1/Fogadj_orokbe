const puppeteer = require('puppeteer');

(async () => {
  // Launch the browser
  const browser = await puppeteer.launch({ headless: false });  // Use headless: true if you don't need a visible browser window
  const page = await browser.newPage();

  // Navigate to your local server on port 3000 (or the appropriate port)
  await page.goto('http://localhost:80');  // Replace with your actual port if different
  console.log("Navigated to localhost!");
  await page.setViewport({width: 1920, height: 1080});

  // Take a screenshot as a test
  await page.screenshot({ path: 'localhost.png' });
  
  // Do additional actions if needed, such as checking elements, interacting, etc.

  // Close the browser
  await browser.close();
})();
