module.exports = {
    // Indicate that this is the root configuration
    root: true,

    // Environment settings
    env: {
        browser: true, // Browser global variables
        es2021: true,  // Enable all ECMAScript 2021 globals
        node: true,    // Node.js global variables and Node.js scoping
    },

    // Extending recommended ESLint rules and other configs
    extends: [
        'eslint:recommended', // Use recommended rules from eslint
        'plugin:@typescript-eslint/recommended', // Use recommended rules from the @typescript-eslint/eslint-plugin
    ],

    // Custom rules
    rules: {
        'no-unused-vars': 'warn', // Warns about unused variables
        'no-console': 'off', // Allow console.log statements
        'semi': ['error', 'always'], // Enforce semicolons
        'quotes': ['error', 'single'], // Enforce single quotes
        // Add more custom rules here as needed
    },

    // Parser options
    parserOptions: {
        ecmaVersion: 12, // Allows for the parsing of modern ECMAScript features
        sourceType: 'module', // Allows for the use of imports
    },
};
