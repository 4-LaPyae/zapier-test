<div style="max-width: 900px; margin: 2rem auto; padding: 0 1rem; font-family: Arial, sans-serif;">
    {{-- <h1 style="text-align: center; margin-bottom: 1.5rem; color: #1f2937;">Athlete Profiles</h1> --}}

    <form method="POST" action="/queue-test/email" style="display: flex; gap: 0.75rem; justify-content: center; margin-bottom: 1.5rem; flex-wrap: wrap;">
        @csrf
        <input
            type="email"
            name="email"
            required
            placeholder="Recipient email"
            style="padding: 0.6rem 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; min-width: 240px;"
        />
        <button
            type="submit"
            style="padding: 0.6rem 1rem; background: #2563eb; color: #ffffff; border: none; border-radius: 8px; cursor: pointer;"
        >
            Send Email
        </button>
    </form>

    <form method="POST" action="/queue-test/zapier" style="display: flex; gap: 0.75rem; justify-content: center; margin-bottom: 1.5rem; flex-wrap: wrap;">
        @csrf
        <input
            type="text"
            name="payload[first_name]"
            required
            placeholder="First Name"
            style="padding: 0.6rem 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; min-width: 180px;"
        />
        <input
            type="text"
            name="payload[last_name]"
            required
            placeholder="Last Name"
            style="padding: 0.6rem 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; min-width: 180px;"
        />
        <input
            type="text"
            name="payload[country]"
            required
            placeholder="Country"
            style="padding: 0.6rem 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; min-width: 180px;"
        />
        <input
            type="email"
            name="payload[email]"
            required
            placeholder="Email"
            style="padding: 0.6rem 0.75rem; border: 1px solid #d1d5db; border-radius: 8px; min-width: 240px;"
        />
        <button
            type="submit"
            style="padding: 0.6rem 1rem; background: #059669; color: #ffffff; border: none; border-radius: 8px; cursor: pointer;"
        >
            Send to Zapier
        </button>
    </form>

    {{-- <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem;">
        @foreach ($data as $d)
            <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 1rem; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                <h2 style="margin: 0 0 0.5rem; color: #111827; font-size: 1.25rem;">{{ $d->athlete }}</h2>
                <p style="margin: 0.25rem 0; color: #374151;"><strong>Age:</strong> {{ $d->age }}</p>
                <p style="margin: 0.25rem 0; color: #374151;"><strong>Country:</strong> {{ $d->country }}</p>
            </div>
        @endforeach
    </div>
</div> --}}

