
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package api;

import dao.BonificacaoDao;
import dao.MateriaisEmOperacaoComercialDao;
import dao.OperacaoComercialDao;
import entidades.Catador;
import entidades.Funcionario;
import entidades.MateriaisEmOperacaoComercial;
import entidades.Material;
import entidades.OperacaoComercial;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.json.JSONArray;
import org.json.JSONObject;

/**
 *
 * @author reisl
 */
@WebServlet(name = "CompraApi", urlPatterns = {"/compra"})
public class CompraApi extends HttpServlet {

    @Override
    protected void doPost(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
        BufferedReader reader = req.getReader();
        StringBuilder jb = new StringBuilder();

        String line;
        while ((line = reader.readLine()) != null) {
            jb.append(line);
        }
        JSONObject dados = new JSONObject(jb.toString());

        PrintWriter out = res.getWriter();
        res.setContentType("application/json");
        res.addHeader("Access-Control-Allow-Origin", "null");
        Catador catador = new Catador();
        catador.setId(dados.getInt("id_catador"));
        
        OperacaoComercial op = new OperacaoComercial();
        op.setCatador(catador);
        op.setTotal_sugerido(dados.getDouble("total_sugerido"));
        op.setTotal_final(dados.getDouble("total_final"));
        
        Funcionario funcionario = new Funcionario();
        funcionario.setId((Integer.parseInt((String)req.getSession().getAttribute("funcionarioId"))));
        op.setFuncionario(funcionario);
        
        int idOp = OperacaoComercialDao.inserirCompra(op);
        
        
        JSONArray materiaisArray = dados.getJSONArray("materiais");
        for (int i = 0; i < materiaisArray.length(); i++) {
            JSONObject materialObj = materiaisArray.getJSONObject(i);

            Material material = new Material();
            material.setId(materialObj.getInt("id_material"));

            OperacaoComercial opC = new OperacaoComercial();
            opC.setId(idOp);

            MateriaisEmOperacaoComercial matEmOp = new MateriaisEmOperacaoComercial();
            matEmOp.setMaterial(material);
            matEmOp.setQuantidadeEmKg(materialObj.getDouble("total_em_kg"));
            matEmOp.setOperacaoComercial(opC);

            int status = MateriaisEmOperacaoComercialDao.inserirMaterialEmCompra(matEmOp);
        }
        double bonificacao = dados.getDouble("bonificacao");
        if(bonificacao > 0) {
            BonificacaoDao.confirmandoBonificacoes(catador.getId());
        }
        JSONObject retorno = new JSONObject();
        String usuario = (String) req.getSession().getAttribute("funcionarioId");
        
        retorno.put("Situação", usuario);
        
        out.print(retorno.toString());
        out.flush();

    }
    protected void doGet(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
         
    }
}