<script setup>
    import { Link } from '@inertiajs/vue3';
    import { useForm } from '@inertiajs/vue3';
    import countries from 'i18n-iso-countries';
    import enLocale from 'i18n-iso-countries/langs/en.json';
import { onMounted } from 'vue';
    countries.registerLocale(enLocale);

    // Data Object
    const form = useForm({
        id: '',
        name: '',
        email: '',
        phone: '',
        job_title: '',
        company: '',
        country: '',
        country_code: ''
    });

    // Define props
    const props = defineProps ({
        contact: {
            type: Object,
            required: true
        }
    })

    // New Contact function
    const updateContact = () => {
        form.post(route('contacts.update', form.id));
    };

    // Fill form once component is mounted
    onMounted(() => {
        form.id = props.contact.id;
        form.name = props.contact.name;
        form.email = props.contact.email;
        form.phone = props.contact.phone;
        form.job_title = props.contact.job_title;
        form.company = props.contact.company;
        form.country = props.contact.country;
        form.country_code = props.contact.country_code;
    });

    // Set country alpha code
    const setCountryAlphaCode = (country) => {
        form.country_code = countries.getAlpha2Code(country.target.value, 'en');
    };
</script>

<template>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6 mx-auto mt-5">
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="text-center mt-2">
                            Edit Contact
                        </h5>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="updateContact">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name *</label>
                                        <input 
                                            type="text"
                                            id="name" name="name" 
                                            class="form-control" 
                                            placeholder="Name"
                                            v-model="form.name"
                                            >
                                        <div class="text-white bg-danger p-2 rounded my-2" v-if="form.errors.name">
                                            {{ form.errors.name }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email *</label>
                                        <input 
                                            type="email"
                                            id="email" name="email" 
                                            class="form-control" 
                                            placeholder="Email"
                                            v-model="form.email"
                                            >
                                        <div class="text-white bg-danger p-2 rounded my-2" v-if="form.errors.email">
                                            {{ form.errors.email }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone *</label>
                                        <input 
                                            type="text"
                                            id="phone" name="phone" 
                                            class="form-control" 
                                            placeholder="Phone"
                                            v-model="form.phone"
                                            >
                                        <div class="text-white bg-danger p-2 rounded my-2" v-if="form.errors.phone">
                                            {{ form.errors.phone }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="job_title" class="form-label">Job Title *</label>
                                        <input 
                                            type="text"
                                            id="job_title" name="job_title" 
                                            class="form-control" 
                                            placeholder="Job Title"
                                            v-model="form.job_title"
                                            >
                                        <div class="text-white bg-danger p-2 rounded my-2" v-if="form.errors.job_title">
                                            {{ form.errors.job_title }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="company" class="form-label">Company *</label>
                                        <input 
                                            type="text"
                                            id="company" name="company" 
                                            class="form-control" 
                                            placeholder="Company"
                                            v-model="form.company"
                                            >
                                        <div class="text-white bg-danger p-2 rounded my-2" v-if="form.errors.company">
                                            {{ form.errors.company }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="country" class="form-label">Country *</label>
                                        <input 
                                            type="text"
                                            id="country" name="country" 
                                            class="form-control" 
                                            placeholder="Country"
                                            v-model="form.country"
                                            @change="setCountryAlphaCode"
                                            >
                                        <div class="text-white bg-danger p-2 rounded my-2" v-if="form.errors.country">
                                            {{ form.errors.country }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-2">
                                <button type="submit" 
                                    class="btn btn-sm btn-dark me-1">
                                    Submit
                                </button>
                                <Link href="/" 
                                    class="btn btn-sm btn-warning">
                                    Cancel
                                </Link>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
</style>