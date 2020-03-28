<template> </template>

<script>
export default {
    props: ["product", "url"],
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            formData: {}
        };
    },

    methods: {
        postReview() {
            this.formData.product_id = this.product.id;

            axios
                .post(this.url, this.formData)
                .then(data => {
                    location.reload();
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
};
</script>
