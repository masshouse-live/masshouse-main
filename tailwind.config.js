/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                nunito: ["Nunito", "sans-serif"],
            },
            colors: {
                primary: ({ opacityVariable, opacityValue }) => {
                    if (opacityValue !== undefined) {
                        return `rgba(var(--primary), ${opacityValue})`;
                    }
                    if (opacityVariable !== undefined) {
                        return `rgba(var(--primary), var(${opacityVariable}, 1))`;
                    }
                    return `rgb(var(--primary))`;
                },
                textPrimary: ({ opacityVariable, opacityValue }) => {
                    if (opacityValue !== undefined) {
                        return `rgba(var(--text-primary), ${opacityValue})`;
                    }
                    if (opacityVariable !== undefined) {
                        return `rgba(var(--text-primary), var(${opacityVariable}, 1))`;
                    }
                    return `rgb(var(--text-primary))`;
                },
                textSecondary: ({ opacityVariable, opacityValue }) => {
                    if (opacityValue !== undefined) {
                        return `rgba(var(--text-secondary), ${opacityValue})`;
                    }
                    if (opacityVariable !== undefined) {
                        return `rgba(var(--text-secondary), var(${opacityVariable}, 1))`;
                    }
                    return `rgb(var(--text-secondary))`;
                },
                secondary: ({ opacityVariable, opacityValue }) => {
                    if (opacityValue !== undefined) {
                        return `rgba(var(--secondary), ${opacityValue})`;
                    }
                    if (opacityVariable !== undefined) {
                        return `rgba(var(--secondary), var(${opacityVariable}, 1))`;
                    }
                    return `rgb(var(--secondary))`;
                },
                tertiary: ({ opacityVariable, opacityValue }) => {
                    if (opacityValue !== undefined) {
                        return `rgba(var(--tertiary), ${opacityValue})`;
                    }
                    if (opacityVariable !== undefined) {
                        return `rgba(var(--tertiary), var(${opacityVariable}, 1))`;
                    }
                    return `rgb(var(--tertiary))`;
                },
                accent: ({ opacityVariable, opacityValue }) => {
                    if (opacityValue !== undefined) {
                        return `rgba(var(--accent), ${opacityValue})`;
                    }
                    if (opacityVariable !== undefined) {
                        return `rgba(var(--accent), var(${opacityVariable}, 1))`;
                    }
                    return `rgb(var(--accent))`;
                },
            },
        },
    },
    plugins: [],
};
