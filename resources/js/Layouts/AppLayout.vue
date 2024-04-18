<script setup>
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import Banner from "@/Components/Banner.vue";
import SidebarPages from "./Partials/Sidebar/SidebarPages.vue";

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(
        route("current-team.update"),
        {
            team_id: team.id,
        },
        {
            preserveState: false,
        }
    );
};

const logout = () => {
    router.post(route("logout"));
};
</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <div class="min-h-screen bg-slate-100 dark:bg-slate-900">
            <SidebarPages />

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
