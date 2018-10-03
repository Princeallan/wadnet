
<template>
    <div>
        <a @click="$emit('ontesr')" class="btn btn-secondary btn-block">Send2</a>
        <div class="contact-form">

            <div class="container">
                <div class="row contact">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <h1>Get in Touch</h1>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 right">
                        <div class="form-group">
                            <label> Name: </label>
                            <input type="text" class="form-control form-control-lg" placeholder="Your Name" v-model="contact.name">
                        </div>
                        <div class="form-group">
                            <label> Email: </label>
                            <input type="email" class="form-control form-control-lg" placeholder="YourEmail@email.com"
                                   v-model="contact.email">
                        </div>
                        <div class="form-group">
                            <label >Message: </label>
                            <textarea class="form-control form-control-lg" v-model="contact.message"></textarea>
                        </div>
                        <button @click="addContact" class="btn btn-secondary btn-block">Sends</button>
                        <!--<input type="button"  class="btn btn-secondary btn-block" value="Send">-->
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>
<script>

    export default {
        data:()=>({
            contact: {
                name: '',
                email: '',
                message: '',
            }
        }),
        methods: {
            addContact() {
                console.log("tcrc");
                return;
                let vm = this;
                let data = vm.contact;

                axios.post('/api/contact-us', data).then((response) => {

                    window.location.href = '/contact-us';
                    vm.data = [];

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
