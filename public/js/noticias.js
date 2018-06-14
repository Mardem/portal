$('#cp4').colorpicker({"color": "#563d7c"});
$('#editor').trumbowyg({
  lang: 'pt_br',
  btns: [
    ['template'],
    ['viewHTML'],
    ['undo', 'redo'], // Only supported in Blink browsers
    ['formatting'],
    ['strong', 'em', 'del'],
    ['superscript', 'subscript'],
    ['link'],
    ['base64'],
    ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
    ['unorderedList', 'orderedList'],
    ['horizontalRule'],
    ['removeformat'],
    ['fullscreen']
  ],
  plugins: {
    templates: [
      {
        name: 'Template 1',
        html: '<p>I am a template!</p>'
      },
      {
        name: 'Template 2',
        html: '<p>I am a different template!</p>'
      }
    ]
  }
});

$('input[name=titulo]').focusout(function() {
  mostraLink();
});

function validar() {
  let titulo = $('input[name=titulo]');
  let arquivo = $('input[name=imagem]');
  let descricao = $('textarea[name=descricao]');
  let code = $('#saveCode');
  
  
  
  if (titulo.val() === '') {
    swal({
      title: "Título",
      text: "O campo de título está incompleto!",
      icon: "error",
      button: "OK",
    });
  } else if (arquivo.val() === '') {
    swal({
      title: "Imagem principal",
      text: "Você não selecionou nenhuma imagem principal!",
      icon: "error",
      button: "OK",
    });
  } else if (descricao.val() === '') {
    swal({
      title: "Descrição",
      text: "Preencha o campo de pequena descrição da notícia!",
      icon: "error",
      button: "OK",
    });
  } else if (code === '') {
    swal({
      title: "Notícia",
      text: "É preciso de uma notícia para finalizar o lançamento!",
      icon: "error",
      button: "OK",
    });
  } else {
    let range = $('#editor').trumbowyg('html');
    
    $('#check').css('display', 'none');
    $('#save').css('display', 'inline-block');
    
    $('#saveCode').val(range);
    swal({
      title: "Validado!",
      text: "Parabéns sua notícia foi validada com sucesso!",
      icon: "success",
      button: "OK",
    });
  }
}


function removerAcentos(newStringComAcento) {
  var string = newStringComAcento;
  var mapaAcentosHex = {
    a: /[\xE0-\xE6]/g,
    A: /[\xC0-\xC6]/g,
    e: /[\xE8-\xEB]/g,
    E: /[\xC8-\xCB]/g,
    i: /[\xEC-\xEF]/g,
    I: /[\xCC-\xCF]/g,
    o: /[\xF2-\xF6]/g,
    O: /[\xD2-\xD6]/g,
    u: /[\xF9-\xFC]/g,
    U: /[\xD9-\xDC]/g,
    c: /\xE7/g,
    C: /\xC7/g,
    n: /\xF1/g,
    N: /\xD1/g,
  };
  
  for (var letra in mapaAcentosHex) {
    var expressaoRegular = mapaAcentosHex[letra];
    string = string.replace(expressaoRegular, letra);
  }
  
  return string;
}



  function mostraLink () {
    let titulo = $('input[name=titulo]');
    if (titulo.val() === '') {
      swal({
        title: "Título",
        text: "É necessário um título para gerar um link de acesso",
        icon: "error",
        button: "OK",
      });
    } else {
      
      swal({
        title: 'Link de acesso',
        text: 'Link gerado com sucesso, este é o link que será mostrado para o usuário final. Se você conhece ou' +
        ' sabe' +
        ' algo' +
        ' sobre Otimização de Motor de Busca (SEO) use o Google Trends para destacar sua notícia melhor\n',
        icon: "info"
      });
      let tituloTraco = titulo.val().split(' ').join('-').toLowerCase();
      let res = removerAcentos(tituloTraco);

      if ($('#seoLink').val()) {
          console.log('campo criado')
      } else {
          $('#link').prepend('<label for="">Link da notícia</label>  <input type="input" class="form-control"' +
              ' name="linkNoticia" value="' + res + '" id="seoLink"/>' + '<small class="text-muted">Este é o link que será mostrado para o' +
              ' usuário final. Se você conhece ou sabe algo sobre Otimização de Motor de Busca (SEO) use o ' +
              ' <a href="https://trends.google.com.br/trends/" rel="nofollow">Google Trends</a> para destacar sua' +
              ' notícia melhor</small>');
      }
    }
  }
  