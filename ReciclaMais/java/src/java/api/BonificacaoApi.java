package api;

import dao.BonificacaoDao;
import dao.CatadorDao;
import dao.MateriaisEmOperacaoComercialDao;
import entidades.Bonificacao;
import entidades.Catador;
import entidades.MateriaisEmOperacaoComercial;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.List;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.json.JSONArray;
import org.json.JSONObject;

@WebServlet(name = "BonificacaoApi", urlPatterns = {"/bonificacao"})
public class BonificacaoApi extends HttpServlet {

    @Override
    protected void doGet(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
        res.setHeader("Content-Type", "application/json");

        List<MateriaisEmOperacaoComercial> listaCatadores = MateriaisEmOperacaoComercialDao.getCatadoresBonificar();

        JSONArray retorno = new JSONArray();

        for (int i = 0; i < listaCatadores.size(); i++) {
            double totalVendido = MateriaisEmOperacaoComercialDao.totalVendidoPorMaterialECatador(listaCatadores.get(i).getOperacaoComercial().getCatador().getId(), listaCatadores.get(i).getMaterial().getId());
            int bonificacoesRecebidas = BonificacaoDao.totalBonificacaoPorCatador(listaCatadores.get(i).getOperacaoComercial().getCatador().getId(), listaCatadores.get(i).getMaterial().getId());
            int qtdBonificacoesMerecidas = listaCatadores.get(i).getOperacaoComercial().getCatador().quantidadeBonificacoesMerecidas(bonificacoesRecebidas, totalVendido, listaCatadores.get(i).getMaterial().getMetaBonificacaoKg());
            int ultimaTransacao = MateriaisEmOperacaoComercialDao.ultimaTransacaoPorCatadorEMaterial(listaCatadores.get(i).getOperacaoComercial().getCatador().getId(), listaCatadores.get(i).getMaterial().getId());
            JSONObject objetoCatadores = new JSONObject();

            objetoCatadores.put("id_catador", listaCatadores.get(i).getOperacaoComercial().getCatador().getId());
            objetoCatadores.put("id_material", listaCatadores.get(i).getMaterial().getId());
            objetoCatadores.put("meta_bonificacao_kg", listaCatadores.get(i).getMaterial().getMetaBonificacaoKg());
            objetoCatadores.put("total_vendido", totalVendido);
            objetoCatadores.put("nome_material", listaCatadores.get(i).getMaterial().getNome());
            objetoCatadores.put("valor_bonificar", listaCatadores.get(i).getMaterial().valorABonificar(qtdBonificacoesMerecidas));
            objetoCatadores.put("quantidade_bonificacoes", qtdBonificacoesMerecidas);
            objetoCatadores.put("id_materiais_em_operacao_comercial", ultimaTransacao);
            objetoCatadores.put("nome_catador", listaCatadores.get(i).getOperacaoComercial().getCatador().getNome());
            retorno.put(objetoCatadores);
        }
        PrintWriter out = res.getWriter();
        out.print(retorno.toString());
        out.flush();
    }

    @Override
    protected void doPost(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
        BufferedReader reader = req.getReader();
        StringBuilder jb = new StringBuilder();

        String line;
        while ((line = reader.readLine()) != null) {
            jb.append(line);
        }
        JSONObject dados = new JSONObject(jb.toString());
        JSONObject retorno = new JSONObject();
        
        MateriaisEmOperacaoComercial matEmOp = new MateriaisEmOperacaoComercial();
        matEmOp.setId(dados.getInt("id_material_em_op"));
        
        Bonificacao bonificacao = new Bonificacao();
        bonificacao.setMatEmOp(matEmOp);
        bonificacao.setQuantidadeReferente(dados.getInt("quantidade_referente"));
        bonificacao.setStatus("pendente");
        bonificacao.setValor(dados.getDouble("valor"));
        
        int status = BonificacaoDao.inserirBonificacao(bonificacao);
        retorno.put("status", status);
        PrintWriter out = res.getWriter();
        res.setContentType("application/json");
        res.addHeader("Access-Control-Allow-Origin", "null");

        
        out.print(retorno);
    }
}
