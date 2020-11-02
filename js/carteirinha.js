$(document).ready(function(){
    carregaCarteirinha();
    carregaDependetes();

    function carregaCarteirinha(){
	    $.ajax({
            url: 'pegaDadosCarteirinha.php',
            method: 'POST',
            dataType: 'json',
            data: {
                acao: 1
            },
            success: function(resposta){
                for(var i = 0; i < resposta.length; i++){
                    $('#carteirinha').append('<td>'+resposta[i]+'</td>');
                }
            }
        })
    }

    function carregaDependetes(){
        $.ajax({
            url: 'pegaDadosCarteirinha.php',
            method: 'POST',
            dataType: 'json',
            data: {
                acao: 2
            },
            success: function(resposta){
                var cpfAnterior = '';
                console.log(resposta);
                resposta.forEach(function(item, index){
                    if(cpfAnterior == item.cpf){
                        $(`#table-${index-1}`)
                        .append(`
                            <tr>
                                <td> ${item.tipo_vacina} </td>
                                <td> ${item.lote} </td>
                                <td> ${item.data_tomada} </td>
                                <td> ${item.data_agendada} </td>
                                <td> ${item.local} </td>
                                <td> ${item.aplicador} </td>
                            </tr>
                        `);
                    }
                    else{
                        $('#container-dependentes').append(`
                            <h1> ${item.nome} </h1>
                            <table class = 'table table-hover'>
                                <thead>
                                    <tr> 
                                        <th><b>Dose</b></th>
                                        <th><b>Lote</b></th>
                                        <th><b>Data aplicada</b></th>
                                        <th><b>Data agendada</b></th>
                                        <th><b>Local</b></th>
                                        <th><b>Rubrica</b></th>
                                    </tr>
                                </thead>
                                <tbody id = table-${index}>
                                    <tr>
                                        <td> ${item.tipo_vacina} </td>
                                        <td> ${item.lote} </td>
                                        <td> ${item.data_tomada} </td>
                                        <td> ${item.data_agendada} </td>
                                        <td> ${item.local} </td>
                                        <td> ${item.aplicador} </td>
                                    </tr>
                                </tbody>
                            </table>
                        `);
                        cpfAnterior = item.cpf;
                    }
                });
                // for(var i = 0; i < resposta.length; i++){
                //     for(var j = 0; j < resposta[i].length; j++){
                //         if(cpfAnterior == resposta[i][8]){
                            
                //         }
                //         else{
                //             $('#container-dependentes').append(`\
                //                 <table class = 'table table-hover'>\
                //                     <thead>\
                //                         <tr>\ 
                //                             <th><b>Dose</b></th>\ 
                //                             <th><b>Lote</b></th>\
                //                             <th><b>Data aplicada</b></th>\
                //                             <th><b>Data agendada</b></th>\
                //                             <th><b>Local</b></th>\
                //                             <th><b>Rubrica</b></th>\
                //                         </tr>\
                //                     </thead>\
                //                     <tbody>\
                //                         <tr>\
                //                             <td>${resposta[i][j]}</td>
                //                         </tr>\
                //                     </tbody>\
                //                 </table>\
                //             `);
                //         }
                //         cpfAnterior = resposta[i][8];
                //     }
                // }
            },
        })
    }
})

