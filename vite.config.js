export default {
  build: {
    manifest: true,
    watch: true,
    rollupOptions: {
      input: {
        index: '/js/index.js',
        admin: '/js/admin.js',
        login: '/js/login.js',
      },
    },
  },
};
