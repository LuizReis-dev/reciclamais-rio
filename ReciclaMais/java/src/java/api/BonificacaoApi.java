package api;

import dao.CatadorDao;
import entidades.Catador;
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
        List<RelatorioBonificacao> listaCatadores = CatadorDao.getCatadoresBonificar();

        JSONArray retorno = new JSONArray();

        for (int i = 0; i < listaCatadores.size(); i++) {
            JSONObject objetoCatadores = new JSONObject();
            objetoCatadores.put("id_catador", listaCatadores.get(i).getId_catador());
            objetoCatadores.put("id_material", listaCatadores.get(i).getId_material());
            objetoCatadores.put("total_vendido", listaCatadores.get(i).getTotal_vendido());
            objetoCatadores.put("meta_bonificacao_kg", listaCatadores.get(i).getMeta_bonificacao_kg());
            objetoCatadores.put("valor_bonificar", listaCatadores.get(i).valorABonificar());
            objetoCatadores.put("quantidade_bonificacoes", listaCatadores.get(i).quantidadeBonificacoesMerecidas());

            retorno.put(objetoCatadores);
        }
        PrintWriter out = res.getWriter();
        out.print(retorno.toString());
        out.flush();
    }
}
