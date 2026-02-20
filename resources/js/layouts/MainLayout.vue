<template>
  <div>
    <!-- Navbar -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
      <div class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
          <!-- Logo kiri -->
          <div class="flex items-center space-x-2">
            <img src="/aset/img/logotrans.png" alt="logo" class="w-10 h-10" />
            <span class="text-xl font-bold text-green-800">HSM Jamur</span>
          </div>

          <!-- Menu kanan -->
          <div class="flex items-center gap-4">
            <!-- Links (desktop) -->
            <div class="hidden md:flex items-center justify-center gap-7">
              <Link href="/" :class="['nav-link block', $page.url === '/' ? 'text-green-600 font-semibold border-b-2 border-green-600 pb-1' : '']">Beranda</Link>
              <Link href="/produk" :class="['nav-link block', $page.url === '/produk' ? 'text-green-600 font-semibold border-b-2 border-green-600 pb-1' : '']">Produk</Link>
              <Link href="/farmtour" :class="['nav-link block', $page.url === '/farmtour' ? 'text-green-600 font-semibold border-b-2 border-green-600 pb-1' : '']">Farm Tour</Link>
            </div>


            <!-- Auth -->
            <div class="relative" v-if="user">
              <button
                @click="toggleMenu"
                class="w-10 h-10 rounded-full overflow-hidden border-2 border-green-600 focus:outline-none"
              >
                <img
                  :src="user.avatar || 'https://ui-avatars.com/api/?name=' + user.name"
                  alt="User avatar"
                  class="w-full h-full object-cover"
                />
              </button>

              <div
                v-if="menuOpen"
                class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-lg py-2 z-50"
              >
                <Link href="/admin" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</Link>
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

            

            <!-- Mobile Hamburger -->
            <button
              @click="mobileOpen = true"
              class="md:hidden focus:outline-none text-gray-700"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </nav>

    <!-- Mobile Drawer -->
    <TransitionRoot as="template" :show="mobileOpen">
      <Dialog as="div" class="relative z-50 md:hidden" @close="mobileOpen = false">
        <!-- Background overlay -->
        <TransitionChild
          as="template"
          enter="transition-opacity ease-linear duration-200"
          enter-from="opacity-0"
          enter-to="opacity-100"
          leave="transition-opacity ease-linear duration-200"
          leave-from="opacity-100"
          leave-to="opacity-0"
        >
          <div class="fixed inset-0 bg-black/30" />
        </TransitionChild>

        <!-- Drawer panel -->
        <div class="fixed inset-0 flex justify-end">
          <TransitionChild
            as="template"
            enter="transition ease-in-out duration-300 transform"
            enter-from="translate-x-full"
            enter-to="translate-x-0"
            leave="transition ease-in-out duration-300 transform"
            leave-from="translate-x-0"
            leave-to="translate-x-full"
          >
            <DialogPanel class="relative bg-white w-72 h-full shadow-xl p-6 pt-12 flex flex-col space-y-4">
              <button
                @click="mobileOpen = false"
                class="absolute top-4 right-4 text-gray-600 hover:text-green-600"
              >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>

              <div class="mt-20 flex flex-col divide-y divide-gray-100">
                <Link href="/" :class="['nav-link text-lg py-3 px-2 rounded-lg', $page.url === '/' ? 'bg-green-50 text-green-700 font-semibold' : '']">Beranda</Link>
                <Link href="/produk" :class="['nav-link text-lg py-3 px-2 rounded-lg', $page.url.startsWith('/produk') ? 'bg-green-50 text-green-700 font-semibold' : '']">Produk</Link>
                <Link href="/farmtour" :class="['nav-link text-lg py-3 px-2 rounded-lg', $page.url.startsWith('/farmtour') ? 'bg-green-50 text-green-700 font-semibold' : '']">Farm Tour</Link>
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </Dialog>
    </TransitionRoot>

    <!-- Slot konten -->
    <main>
      <slot />
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-4">
      <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 mb-2 md:grid-cols-4 gap-4">
          <div>
            <div class="flex items-center mb-4">
              <span class="text-xl font-bold">HSM Jamur</span>
            </div>
            <p class="text-gray-400">Jamur premium yang dibudidaya dengan praktik berkelanjutan sejak 2010.</p>
          </div>
          <div>
            <h4 class="text-lg font-semibold mb-4">Produk</h4>
            <ul class="space-y-2">
              <li><a href="/produk" class="text-gray-400 hover:text-white transition">Jamur</a></li>
              <li><a href="/funfact" class="text-gray-400 hover:text-white transition">Fun Fact</a></li>
            </ul>
          </div>
          <div>
            <h4 class="text-lg font-semibold mb-4">Shop</h4>
            <ul class="space-y-2">
              <li><a href="/lokasi" class="text-gray-400 hover:text-white transition">Lokasi Toko</a></li>
            </ul>
            <div class="flex space-x-4 mb-4">
              <a
                href="#"
                @click.prevent="goToWhatsApp('footer')"
                class="text-gray-400 hover:text-white transition"
              >
                <i class="fab fa-whatsapp text-2xl"></i> Whatsapp
              </a>

            </div>
          </div>
          <div>
            <h4 class="text-lg font-semibold mb-4">Company</h4>
            <ul class="space-y-2">
              <li><a href="/farmtour" class="text-gray-400 hover:text-white transition">Budidaya</a></li>
            </ul>
          </div>
        </div>

        <div class="border-t border-gray-800 pt-2 flex flex-col md:flex-row justify-between items-center">
          <p class="text-gray-500 text-sm">© 2025 HSM Jamur. All rights reserved.</p>
          <div class="flex space-x-6 mt-4 md:mt-0">
            <a href="/privacy" class="text-gray-500 hover:text-white text-sm">Privacy Policy</a>
            <a href="/terms" class="text-gray-500 hover:text-white text-sm">Terms of Service</a>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup>
import axios from 'axios'
import { computed, ref } from "vue";
import { Link, usePage, router } from "@inertiajs/vue3";

const waNumber = computed(() => page.props.wa_number);

const page = usePage();
const user = computed(() => page.props.auth.user);

const menuOpen = ref(false);
const mobileOpen = ref(false);
const toggleMenu = () => (menuOpen.value = !menuOpen.value);
import {
  Dialog,
  DialogPanel,
  TransitionChild,
  TransitionRoot,
} from "@headlessui/vue";

const goToWhatsApp = async (sourcePage = 'layout', productId = null) => {
  try {
    await axios.post('/click-log', {
      source_page: sourcePage,
      product_id: productId,
    })
  } catch (e) {
    console.error('Click log failed', e)
  } finally {
    const phone = waNumber.value?.replace(/^0/, '62')
    const text = encodeURIComponent(
      'Halo, saya ingin bertanya mengenai Jamur'
    )

    window.open(`https://wa.me/${phone}?text=${text}`, '_blank')
  }
}


</script>

<style scoped>
.nav-link {
  color: #374151;
  font-weight: 500;
  transition-property: color;
  transition-duration: 150ms;
}
.nav-link:hover {
  color: #16a34a;
}
</style>
