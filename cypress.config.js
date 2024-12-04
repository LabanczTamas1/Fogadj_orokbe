const { defineConfig } = require("cypress");

module.exports = defineConfig({
  projectId: 'rh226c',
  e2e: {
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
  },
});
