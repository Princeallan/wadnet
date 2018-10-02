<script>

    export default {

        name: 'contact',

        data() {
            return{
                contact: {

                }
            }
        },
        methods: {
            AddContact() {
                let vm = this;
                let data = vm.contact;

                axios.post('/api/contact-us', data).then((response) => {

                    window.location.href = '/contact-us';
                    this.data = [];

                    vm.$notify({
                        title: 'Success',
                        message: response.data,
                        type: 'success'
                    });

                });
            }
        }

    }

</script>