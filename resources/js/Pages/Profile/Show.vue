<template>

<v-app style="background-color: #f5f5f5;">

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <update-profile-information-form
                            :name="$page.user.name"
                            :email="$page.user.email" />

                <jet-section-border />

                <update-password-form class="mt-10 sm:mt-0" />

                <div v-if="$page.jetstream.canManageTwoFactorAuthentication">
                    <jet-section-border />

                    <two-factor-authentication-form class="mt-10 sm:mt-0" />
                </div>

                <jet-section-border />
                
                <logout-other-browser-sessions-form :sessions="sessions" class="mt-10 sm:mt-0" />

                <jet-section-border />


            </div>
        </div>
</v-app>
</template>

<script>

    import UpdatePasswordForm from './UpdatePasswordForm'
    import UpdateProfileInformationForm from './UpdateProfileInformationForm'
	import TwoFactorAuthenticationForm from './TwoFactorAuthenticationForm'
	import LogoutOtherBrowserSessionsForm from './LogoutOtherBrowserSessionsForm'
	import JetSectionBorder from './../../Jetstream/SectionBorder'
	import DeleteUserForm from './DeleteUserForm'
	import Layout from '../administrador'

    export default {
        props: ['sessions'],
		layout: (h, page) => h(Layout, [page]),
        components: {

            DeleteUserForm,
            JetSectionBorder,
            LogoutOtherBrowserSessionsForm,
            TwoFactorAuthenticationForm,
            UpdatePasswordForm,
            UpdateProfileInformationForm,
        },
		mounted(){
			this.$root.$emit('child-event',"principal");
			this.$root.$emit("terminareventocargar");
		}
    }
</script>
<style scoped>

</style>
