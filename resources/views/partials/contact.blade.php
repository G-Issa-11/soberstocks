<section class="section contact" id="contact" aria-label="contact">
    <div class="container">
        <h2 class="h2 section-title">Have any Questions?</h2>
        <p class="section-text">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur
            asperiores in officia quod voluptatum adipisci cumque ab hic
            quisquam nulla.
        </p>
        {{-- {{ route('contact.submit') }} --}}
        <form action="" method="post" class="contact-form">
            @csrf
            <div class="input-wrapper">
                <input
                    type="text"
                    name="name"
                    aria-label="name"
                    placeholder="Your name*"
                    required
                    class="input-field"
                />

                <input
                    type="email"
                    name="email_address"
                    aria-label="email"
                    placeholder="Email address*"
                    required
                    class="input-field"
                />
            </div>

            <div class="input-wrapper">
                <input
                    type="text"
                    name="subject"
                    aria-label="subject"
                    placeholder="Subject"
                    class="input-field"
                />

                <input
                    type="number"
                    name="phone"
                    aria-label="phone"
                    placeholder="Phone number"
                    class="input-field"
                />
            </div>

            <textarea
                name="message"
                aria-label="message"
                placeholder="Your message...*"
                required
                class="input-field"
            ></textarea>

            <div class="checkbox-wrapper">
                <input
                    type="checkbox"
                    name="terms_and_policy"
                    id="terms"
                    required
                    class="checkbox"
                />

                <label for="terms" class="label">
                    Accept
                    <a href="#" class="label-link">Terms of Services</a> and
                    <a href="#" class="label-link">Privacy Policy</a>
                </label>
            </div>

            <button type="submit" class="btn btn-primary">
                Send Message
            </button>
        </form>
    </div>
</section>
