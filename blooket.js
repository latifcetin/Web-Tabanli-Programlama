fetch('blooket.json')
    .then(response => response.json())
    .then(data => {
        const quizDiv = document.getElementById('quiz');
        
        data.questions.forEach((soru, index) => {
            const soruDiv = document.createElement('div');
            soruDiv.className = 'soru';
            soruDiv.innerHTML = `
                <p>${index + 1}. ${soru.question}</p>
                ${Object.entries(soru.options).map(([key, value]) => 
                    `<label>
                        <input type="radio" name="soru${index}" value="${key}"> 
                        ${key}: ${value}
                    </label>`
                ).join('<br>')}
            `;
            quizDiv.appendChild(soruDiv);
        });

        window.correctAnswers = data.questions.map(soru => soru.correctAnswer);
    });

function sonucuHesapla() {
    const sorular = document.querySelectorAll('.soru');
    let dogru = 0;

    sorular.forEach((soru, index) => {
        const secilen = soru.querySelector(`input[name="soru${index}"]:checked`);
        if (secilen && secilen.value === window.correctAnswers[index]) {
            dogru++;
        }
    });

    document.getElementById('sonuc').innerHTML = 
        `Toplam ${sorular.length} sorudan ${dogru} doğru yaptınız.`;
}
