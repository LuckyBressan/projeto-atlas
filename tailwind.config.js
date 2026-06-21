export default {
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
        "./resources/css/**/*.css",
        "./routes/**/*.php",
        "./resources/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                brand: {
                    DEFAULT: "#197278",
                    dark: "#283d3b",
                    light: "#edddd4",
                    danger: "#c44536",
                    accent: "#772e25",
                },
            },
        },
    },
    plugins: [],
};
