<script>
    function countCharacters(textarea) {
        var textWithoutSpaces = textarea.value.replace(/\s/g, '');
        var count = textWithoutSpaces.length;
        var countElement = document.getElementById('characterCount');
        countElement.innerText = count + ' karakter';

        if (count >= 150) {
            countElement.style.color = 'green';
        } else {
            countElement.style.color = 'red';
        }
    }
</script>

<script>
    function countCharactersEdit(element) {
        var textWithoutSpaces = element.value.replace(/\s/g, '');
        var count = textWithoutSpaces.length;
        var countElement = document.getElementById('characterCountEdit');
        countElement.innerText = count + ' karakter';

        if (count < 150) {
            countElement.style.color = 'red';
        } else {
            countElement.style.color = 'green';
        }
    }
</script>
