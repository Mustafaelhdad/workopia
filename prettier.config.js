module.exports = {
  plugins: [require("@prettier/plugin-php")],
  semi: true,
  singleQuote: true,
  tabWidth: 2, // Change from 2 to 4 to match desired tab size
  useTabs: false, // Ensure spaces are used instead of tabs
  htmlWhitespaceSensitivity: "ignore", // Allow flexible spacing
  endOfLine: "lf", // Consistent line endings
  bracketSameLine: false, // Place closing brackets of HTML on a new line
};
