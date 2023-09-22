<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="icon-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="icon-home-tab" data-bs-toggle="tab" href="#icon-home"
                                        role="tab" aria-controls="icon-home" aria-selected="true">
                                        <i class="icofont icofont-ui-home"></i>General
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-icon-tab" data-bs-toggle="tab" href="#profile-icon"
                                        role="tab" aria-controls="profile-icon" aria-selected="false">
                                        <i class="icofont icofont-man-in-glasses"></i>Social
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-icon-tab" data-bs-toggle="tab" href="#contact-icon"
                                        role="tab" aria-controls="contact-icon" aria-selected="false">
                                        <i class="icofont icofont-contacts"></i>SEO
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="icon-tabContent">
                                <div class="tab-pane fade show active" id="icon-home" role="tabpanel"
                                    aria-labelledby="icon-home-tab">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form theme-form">
                                                      
                                                        <form
                                                            @submit.prevent="form.put(route('settings.update', { onSuccess: () => editing = false }))">

                                                            <div v-for="(value, key) in settings" :key="key">
                                                                <template v-if="key === 'about_us_short'">
                                                                    <div class="form-group">
                                                                        <label
                                                                            style="padding-top: 30px; padding-left: 5px; font-size: 20px;"
                                                                            for="about_us_short">
                                                                            About us short description
                                                                        </label>

                                                                        <Editor
                                                                            api-key="id08gfbr8b6wcufqtozzc4p4s71qytzzqp3q4la94m9cf6bk"
                                                                            class="form-control" name="about_us_short"
                                                                            id="about_us_short"
                                                                            v-model="form.about_us_short" :init="{
                                                                                plugins: 'lists link image table code help wordcount'
                                                                            }" />
                                                                    </div>
                                                                </template>

                                                                <template v-if="key === 'about_us'">
                                                                    <div class="form-group">
                                                                        <label
                                                                            style="padding-top: 30px; padding-left: 5px; font-size: 20px;"
                                                                            for="about_us">
                                                                            About Us
                                                                        </label>

                                                                        <Editor
                                                                            api-key="id08gfbr8b6wcufqtozzc4p4s71qytzzqp3q4la94m9cf6bk"
                                                                            class="form-control " name="about_us"
                                                                            id="about_us" v-model="form.about_us" :init="{
                                                                                plugins: 'lists link image table code help wordcount'
                                                                            }" />
                                                                    </div>
                                                                </template>
                                                                <template v-if="key === 'foot_copyright_text'">
                                                                    <div class="form-group">
                                                                        <label
                                                                            style="padding-top: 30px; padding-left: 5px; font-size: 20px;"
                                                                            for="foot_copyright_text">
                                                                            Footer Copyright Text
                                                                        </label>
                                                                        <input class="form-control"
                                                                            name="foot_copyright_text"
                                                                            id="foot_copyright_text"
                                                                            v-model="form.foot_copyright_text" />

                                                                    </div>

                                                                </template>

                                                                <template v-if="key === 'membership_success_response'">
                                                                    <div class="form-group">
                                                                        <label
                                                                            style="padding-top: 30px; padding-left: 5px; font-size: 20px;"
                                                                            for="membership_success_response">
                                                                            Membership Response Text
                                                                        </label>
                                                                        <textarea v-model="form.membership_success_response"
                                                                            class="form-control"></textarea>
                                                                    </div>

                                                                </template>
                                                                <template v-if="key === 'contact_us_success_response'">
                                                                    <div class="form-group">
                                                                        <label
                                                                            style="padding-top: 30px; padding-left: 5px; font-size: 20px;"
                                                                            for="contact_us_success_response">
                                                                            Contact us Response Text
                                                                        </label>
                                                                        <textarea v-model="form.contact_us_success_response"
                                                                            class="form-control"></textarea>
                                                                    </div>

                                                                </template>
                                                                <template v-if="key === 'address'">
                                                                    <div class="form-group">
                                                                        <label
                                                                            style="padding-top: 30px; padding-left: 5px; font-size: 20px;"
                                                                            for="address">
                                                                            Address
                                                                        </label>
                                                                        <textarea v-model="form.address"
                                                                            class="form-control"></textarea>
                                                                    </div>

                                                                </template>
                                                                <template v-if="key === 'phone1'">
                                                                    <div class="form-group">
                                                                        <label
                                                                            style="padding-top: 30px; padding-left: 5px; font-size: 20px;"
                                                                            for="phone1">
                                                                            Phone No. 1
                                                                        </label>
                                                                        <input class="form-control" name="phone1"
                                                                            id="phone1" v-model="form.phone1" />
                                                                    </div>

                                                                </template>
                                                                <template v-if="key === 'phone2'">
                                                                    <div class="form-group">
                                                                        <label
                                                                            style="padding-top: 30px; padding-left: 5px; font-size: 20px;"
                                                                            for="phone2">
                                                                            Phone No. 2
                                                                        </label>
                                                                        <input class="form-control" name="phone2"
                                                                            id="phone2" v-model="form.phone2" />
                                                                    </div>

                                                                </template>
                                                                <template v-if="key === 'site_name'">
                                                                    <div class="form-group">
                                                                        <label
                                                                            style="padding-top: 30px; padding-left: 5px; font-size: 20px;"
                                                                            for="site_name">
                                                                            Site Name
                                                                        </label>
                                                                        <input class="form-control" name="site_name"
                                                                            id="site_name" v-model="form.site_name" />
                                                                    </div>

                                                                </template>
                                                                <template v-if="key === 'site_title'">
                                                                    <div class="form-group">
                                                                        <label
                                                                            style="padding-top: 30px; padding-left: 5px; font-size: 20px;"
                                                                            for="site_title">
                                                                            Site Title
                                                                        </label>
                                                                        <input class="form-control" name="site_title"
                                                                            id="site_title" v-model="form.site_title" />
                                                                    </div>

                                                                </template>
                                                                <template v-if="key === 'admin_email'">
                                                                    <div class="form-group">
                                                                        <label
                                                                            style="padding-top: 30px; padding-left: 5px; font-size: 20px;"
                                                                            for="admin_email">
                                                                            Admin Email
                                                                        </label>
                                                                        <input class="form-control" name="admin_email"
                                                                            id="admin_email" v-model="form.admin_email" />
                                                                    </div>

                                                                </template>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary my-2">Save</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="profile-icon" role="tabpanel"
                                    aria-labelledby="profile-icon-tab">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form theme-form">
                                                        <form
                                                            @submit.prevent="form.put(route('settings.update'), { onSuccess: () => editing = false })">

                                                            <div v-for="setting in settings" :key="key">
                                                                <template v-if="key === 'social_facebook'">
                                                                    <div class="form-group">
                                                                        <label
                                                                            style="padding-top: 30px; padding-left: 5px; font-size: 20px;"
                                                                            for="social_facebook">
                                                                            Facebook
                                                                        </label>
                                                                        <input class="form-control" name="social_facebook"
                                                                            id="social_facebook"
                                                                            v-model="form.social_facebook" />
                                                                    </div>
                                                                </template>

                                                                <template v-if="key === 'social_instagram'">
                                                                    <div class="form-group">
                                                                        <label
                                                                            style="padding-top: 30px; padding-left: 5px; font-size: 20px;"
                                                                            for="social_instagram">
                                                                            Instagram
                                                                        </label>
                                                                        <input class="form-control" name="social_instagram"
                                                                            id="social_instagram"
                                                                            v-model="form.social_instagram" />
                                                                    </div>
                                                                </template>

                                                                <template v-if="key === 'social_linkdin'">
                                                                    <div class="form-group">
                                                                        <label
                                                                            style="padding-top: 30px; padding-left: 5px; font-size: 20px;"
                                                                            for="social_linkdin">
                                                                            Linkdin
                                                                        </label>
                                                                        <input class="form-control" name="social_linkdin"
                                                                            id="social_linkdin"
                                                                            v-model="form.social_linkdin" />
                                                                    </div>
                                                                </template>

                                                                <template v-if="key === 'pinterest'">
                                                                    <div class="form-group">
                                                                        <label
                                                                            style="padding-top: 30px; padding-left: 5px; font-size: 20px;"
                                                                            for="pinterest">
                                                                            Pinterest
                                                                        </label>
                                                                        <input class="form-control" name="pinterest"
                                                                            id="pinterest" v-model="form.pinterest" />
                                                                    </div>
                                                                </template>

                                                                <template v-if="key === 'github'">
                                                                    <div class="form-group">
                                                                        <label
                                                                            style="padding-top: 30px; padding-left: 5px; font-size: 20px;"
                                                                            for="github">
                                                                            Git Hub
                                                                        </label>
                                                                        <input class="form-control" name="github"
                                                                            id="github" v-model="form.github" />
                                                                    </div>
                                                                </template>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary my-2">Save</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="contact-icon" role="tabpanel"
                                    aria-labelledby="contact-icon-tab">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form theme-form">
                                                        <form
                                                            @submit.prevent="form.put(route('settings.update'), { onSuccess: () => editing = false })">

                                                            <div v-for="settings in settings" :key="key">
                                                                <template v-if="key === 'seo_meta_title'">
                                                                    <div class="form-group">
                                                                        <label
                                                                            style="padding-top: 30px; padding-left: 5px; font-size: 20px;"
                                                                            for="seo_meta_title">
                                                                            SEO Meta Title
                                                                        </label>
                                                                        <input class="form-control" name="seo_meta_title"
                                                                            id="seo_meta_title"
                                                                            v-model="form.seo_meta_title" />
                                                                    </div>
                                                                </template>
                                                                <template v-if="key === 'seo_meta_description'">
                                                                    <div class="form-group">
                                                                        <label
                                                                            style="padding-top: 30px; padding-left: 5px; font-size: 20px;"
                                                                            for="seo_meta_description">
                                                                            SEO Meta Description
                                                                        </label>
                                                                        <input class="form-control"
                                                                            name="seo_meta_description"
                                                                            id="seo_meta_description"
                                                                            v-model="form.seo_meta_description" />
                                                                    </div>
                                                                </template>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary my-2">Save</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
  
<script setup>
import Editor from '@tinymce/tinymce-vue'
import { ref, } from "vue";
const editing = ref(false);
import { useForm } from 'vee-validate';
const props = defineProps(['settings']);
const form = useForm({
    
    about_us_short: props.settings.about_us_short,
    footer_text: props.settings.footer_text,
    membership_success_response: props.settings.membership_success_response,
    contact_us_success_response: props.settings.contact_us_success_response,
    address: props.settings.address,
    phone1: props.settings.phone1,
    phone2: props.settings.phone2,
    about_us: props.settings.about_us,
    site_name: props.settings.site_name,
    site_title: props.settings.site_title,
    admin_email: props.settings.admin_email,
    foot_copyright_text: props.settings.foot_copyright_text,
    social_facebook: props.settings.social_facebook,
    social_twitter: props.settings.social_twitter,
    social_instagram: props.settings.social_instagram,
    social_linkdin: props.settings.social_linkdin,
    google_analytics: props.settings.google_analytics,
    seo_meta_title: props.settings.seo_meta_title,
    seo_meta_description: props.settings.seo_meta_description,
    github: props.settings.github,
    pinterest: props.settings.pinterest
});

</script>



  