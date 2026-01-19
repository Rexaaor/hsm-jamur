<template>
  <nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4">
      <div class="flex items-center justify-between">
        <!-- Logo kiri -->
        <div class="flex items-center">
          <img src="/aset/img/logotrans.png" alt="logo" class="w-10 h-10" />
          <span class="ml-2 text-xl font-bold text-green-800">HSM Jamur</span>
        </div>

        <!-- Kanan: Links + Auth -->
        <div class="flex items-center space-x-6">
          <!-- Links -->
          <div class="hidden md:flex space-x-6">
            <Link href="/" class="text-gray-600 hover:text-green-600 font-medium">Beranda</Link>
            <Link href="/produk" class="text-gray-600 hover:text-green-600 font-medium">Produk</Link>
            <Link href="/tentang" class="text-gray-600 hover:text-green-600 font-medium">Tentang</Link>
            <Link href="/farmtour" class="text-gray-600 hover:text-green-600 font-medium">Farm Tour</Link>
            <Link href="/kontak" class="text-gray-600 hover:text-green-600 font-medium">Kontak</Link>
          </div>

          <!-- Auth -->
          <div class="relative" v-if="$page.props.auth.user">
            <!-- Avatar -->
            <button
              @click="toggleMenu"
              class="w-10 h-10 rounded-full overflow-hidden border-2 border-green-600 focus:outline-none"
            >
              <img
                :src="$page.props.auth.user.avatar || 'https://ui-avatars.com/api/?name=' + $page.props.auth.user.name"
                alt="User avatar"
                class="w-full h-full object-cover"
              />
            </button>

            <!-- Dropdown -->
            <div
              v-if="menuOpen"
              class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg py-2 z-50"
            >
              <Link href="/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profil</Link>
              <Link
                href="/logout"
                method="post"
                as="button"
                class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100"
              >
                Logout
              </Link>
            </div>
          </div>

          <!-- Kalau belum login -->
          <div v-else>
            <Link
            href="/login"
            class="px-4 py-2 border border-green-600 text-green-600 rounded-full hover:bg-green-600 hover:text-white transition"
          >
            Login
          </Link>

          </div>

        </div>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const menuOpen = ref(false);

const toggleMenu = () => {
  menuOpen.value = !menuOpen.value;
};

document.addEventListener("click", (e) => {
  if (!e.target.closest(".relative")) {
    menuOpen.value = false;
  }
});
</script>
