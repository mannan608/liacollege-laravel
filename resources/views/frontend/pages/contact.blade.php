@extends('frontend.layouts.app')

@section('content')
<!-- Hero -->
  <section class="relative bg-gradient-to-br from-brand-900 via-brand-800 to-brand-900 text-white py-16 sm:py-20 md:py-24 lg:py-28 px-4 sm:px-6 overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 sm:w-80 sm:h-80 md:w-96 md:h-96 bg-brand-500/10 rounded-full blur-3xl -tranbrand-y-1/2 tranbrand-x-1/3"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 sm:w-64 sm:h-64 md:w-72 md:h-72 bg-emerald-500/10 rounded-full blur-3xl tranbrand-y-1/3 -tranbrand-x-1/4"></div>
    <div class="relative max-w-5xl mx-auto text-center">
      <span class="inline-block px-3 py-1 sm:px-4 sm:py-1.5 rounded-full bg-white/10 text-xs sm:text-sm font-medium tracking-wide mb-4 sm:mb-6 border border-white/10 backdrop-blur-sm">GET IN TOUCH</span>
      <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-extrabold tracking-tight mb-4 sm:mb-6 leading-tight">Contact Us</h1>
      <p class="text-base sm:text-lg md:text-xl text-brand-300 max-w-2xl mx-auto leading-relaxed font-light px-2 sm:px-0">We'd love to hear from you. Reach out for inquiries, campus tours, or just to say hello.</p>
    </div>
  </section>

  <!-- Main Content -->
  <main class="max-w-6xl mx-auto px-4 sm:px-6 py-12 sm:py-16 md:py-20">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8 lg:gap-10">

      <!-- Left: Info -->
      <div class="lg:col-span-5 space-y-4 sm:space-y-5 lg:space-y-6">

        <!-- Address -->
        <div class="bg-white rounded-xl sm:rounded-2xl p-5 sm:p-6 md:p-8 shadow-sm border border-neutral-100 transition-all duration-300 hover:shadow-md hover:-tranbrand-y-1">
          <div class="flex items-start gap-4 sm:gap-5">
            <div class="shrink-0 w-10 h-10 sm:w-12 sm:h-12 rounded-lg sm:rounded-xl bg-brand-50 flex items-center justify-center text-brand-600">
              <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <div>
              <h3 class="text-base sm:text-lg font-semibold text-neutral-900 mb-0.5 sm:mb-1">Main Campus</h3>
              <p class="text-sm sm:text-base text-neutral-600 leading-relaxed">Level 14, 333 Collins Street<br>Melbourne, VIC 3000</p>
              <a href="https://maps.google.com/?q=333+Collins+St+Melbourne+VIC+3000" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 mt-2 sm:mt-3 text-xs sm:text-sm font-semibold text-brand-600 hover:text-brand-700 transition-colors">
                Get Directions
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
              </a>
            </div>
          </div>
        </div>

        <!-- Phone -->
        <div class="bg-white rounded-xl sm:rounded-2xl p-5 sm:p-6 md:p-8 shadow-sm border border-neutral-100 transition-all duration-300 hover:shadow-md hover:-tranbrand-y-1">
          <div class="flex items-start gap-4 sm:gap-5">
            <div class="shrink-0 w-10 h-10 sm:w-12 sm:h-12 rounded-lg sm:rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600">
              <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            </div>
            <div>
              <h3 class="text-base sm:text-lg font-semibold text-neutral-900 mb-0.5 sm:mb-1">Phone</h3>
              <a href="tel:0479110567" class="text-xl sm:text-2xl font-bold text-neutral-900 hover:text-brand-600 transition-colors">0479 110 567</a>
              <p class="text-xs sm:text-sm text-neutral-500 mt-1 sm:mt-2">Available during business hours</p>
            </div>
          </div>
        </div>

        <!-- Hours -->
        <div class="bg-white rounded-xl sm:rounded-2xl p-5 sm:p-6 md:p-8 shadow-sm border border-neutral-100 transition-all duration-300 hover:shadow-md hover:-tranbrand-y-1">
          <div class="flex items-start gap-4 sm:gap-5">
            <div class="shrink-0 w-10 h-10 sm:w-12 sm:h-12 rounded-lg sm:rounded-xl bg-amber-50 flex items-center justify-center text-amber-600">
              <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="flex-1 min-w-0">
              <h3 class="text-base sm:text-lg font-semibold text-neutral-900 mb-2 sm:mb-3">Opening Hours</h3>
              <div class="space-y-1.5 sm:space-y-2">
                <div class="flex justify-between items-center py-1.5 sm:py-2 border-b border-neutral-100 gap-4">
                  <span class="text-sm sm:text-base text-neutral-600">Monday – Friday</span>
                  <span class="text-sm sm:text-base font-semibold text-neutral-900 text-right">9:00 AM – 6:00 PM</span>
                </div>
                <div class="flex justify-between items-center py-1.5 sm:py-2 border-b border-neutral-100 gap-4">
                  <span class="text-sm sm:text-base text-neutral-600">Saturday</span>
                  <span class="text-sm sm:text-base font-semibold text-neutral-900 text-right">9:00 AM – 4:00 PM</span>
                </div>
                <div class="flex justify-between items-center py-1.5 sm:py-2 gap-4">
                  <span class="text-sm sm:text-base text-neutral-600">Sunday</span>
                  <span class="text-sm sm:text-base font-medium text-neutral-400 text-right">Closed</span>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>

      <!-- Right: Form -->
      <div class="lg:col-span-7">
        <div class="bg-white rounded-xl sm:rounded-2xl p-5 sm:p-6 md:p-8 lg:p-10 shadow-sm border border-neutral-100 h-full">
          <div class="mb-6 sm:mb-8">
            <h2 class="text-xl sm:text-2xl font-bold text-neutral-900 mb-1 sm:mb-2">Send us a message</h2>
            <p class="text-sm sm:text-base text-neutral-500">Fill out the form below and we'll get back to you within 24 hours.</p>
          </div>

          <form id="contactForm" class="space-y-4 sm:space-y-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
              <div>
                <label for="firstName" class="block text-xs sm:text-sm font-medium text-neutral-700 mb-1 sm:mb-1.5">First Name</label>
                <input type="text" id="firstName" name="firstName" placeholder="John" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 rounded-lg sm:rounded-xl border border-neutral-200 bg-neutral-50 text-neutral-900 placeholder-neutral-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all text-sm sm:text-base" required />
              </div>
              <div>
                <label for="lastName" class="block text-xs sm:text-sm font-medium text-neutral-700 mb-1 sm:mb-1.5">Last Name</label>
                <input type="text" id="lastName" name="lastName" placeholder="Doe" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 rounded-lg sm:rounded-xl border border-neutral-200 bg-neutral-50 text-neutral-900 placeholder-neutral-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all text-sm sm:text-base" required />
              </div>
            </div>

            <div>
              <label for="email" class="block text-xs sm:text-sm font-medium text-neutral-700 mb-1 sm:mb-1.5">Email Address</label>
              <input type="email" id="email" name="email" placeholder="john.doe@example.com" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 rounded-lg sm:rounded-xl border border-neutral-200 bg-neutral-50 text-neutral-900 placeholder-neutral-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all text-sm sm:text-base" required />
            </div>

            <div>
              <label for="subject" class="block text-xs sm:text-sm font-medium text-neutral-700 mb-1 sm:mb-1.5">Subject</label>
              <div class="relative">
                <select id="subject" name="subject" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 pr-10 rounded-lg sm:rounded-xl border border-neutral-200 bg-neutral-50 text-neutral-900 focus:outline-none focus:bg-white focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all cursor-pointer appearance-none text-sm sm:text-base">
                  <option>General Inquiry</option>
                  <option>Campus Tour Booking</option>
                  <option>Course Information</option>
                  <option>Student Support</option>
                  <option>Partnership Opportunity</option>
                </select>
                <div class="absolute right-3 top-1/2 -tranbrand-y-1/2 pointer-events-none text-neutral-400">
                  <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </div>
              </div>
            </div>

            <div>
              <label for="message" class="block text-xs sm:text-sm font-medium text-neutral-700 mb-1 sm:mb-1.5">Message</label>
              <textarea id="message" name="message" rows="4" sm:rows="5" placeholder="How can we help you?" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 rounded-lg sm:rounded-xl border border-neutral-200 bg-neutral-50 text-neutral-900 placeholder-neutral-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-brand-500 focus:border-transparent transition-all resize-none text-sm sm:text-base" required></textarea>
            </div>

            <button type="submit" class="w-full bg-brand-600 hover:bg-brand-700 text-white font-semibold py-3 sm:py-4 rounded-lg sm:rounded-xl transition-all duration-200 hover:shadow-lg hover:-tranbrand-y-0.5 active:tranbrand-y-0 text-sm sm:text-base">
              Send Message
            </button>

            <p class="text-[11px] sm:text-xs text-neutral-400 text-center">By submitting this form, you agree to our privacy policy and terms of service.</p>
          </form>

          <!-- Success Message -->
          <div id="successMessage" class="hidden text-center py-8 sm:py-12">
            <div class="w-14 h-14 sm:w-16 sm:h-16 bg-emerald-50 rounded-full flex items-center justify-center mx-auto mb-4">
              <svg class="w-7 h-7 sm:w-8 sm:h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </div>
            <h3 class="text-lg sm:text-xl font-bold text-neutral-900 mb-2">Message Sent!</h3>
            <p class="text-sm sm:text-base text-neutral-500">Thank you for reaching out. We'll get back to you within 24 hours.</p>
            <button type="button" onclick="resetForm()" class="mt-5 sm:mt-6 text-sm sm:text-base text-brand-600 font-semibold hover:text-brand-700 transition-colors">Send another message</button>
          </div>
        </div>
      </div>

    </div>
  </main>


@endsection


