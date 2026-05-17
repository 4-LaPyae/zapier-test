<div style="max-width: 900px; margin: 2rem auto; padding: 0 1rem; font-family: Arial, sans-serif;">
    <h1 style="text-align: center; margin-bottom: 1.5rem; color: #1f2937;">Athlete Profiles</h1>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem;">
        @foreach ($data as $d)
            <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 1rem; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                <h2 style="margin: 0 0 0.5rem; color: #111827; font-size: 1.25rem;">{{ $d->athlete }}</h2>
                <p style="margin: 0.25rem 0; color: #374151;"><strong>Age:</strong> {{ $d->age }}</p>
                <p style="margin: 0.25rem 0; color: #374151;"><strong>Country:</strong> {{ $d->country }}</p>
            </div>
        @endforeach
    </div>
</div>
