package dao;

import entidades.Catador;
import entidades.MateriaisEmOperacaoComercial;
import entidades.Material;
import entidades.OperacaoComercial;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;
import java.util.List;

public class MateriaisEmOperacaoComercialDao {
    
    public static int inserirMaterialEmCompra(MateriaisEmOperacaoComercial materialEmOp){
       int status = 0;  
   try{
        Connection con = ConnectionDao.getConnection();
        PreparedStatement ps = (PreparedStatement) con.prepareStatement("INSERT INTO materias_em_op(id_operacao_comercial,id_material,total_em_kg) VALUES(?,?,?)");
        ps.setInt(1, materialEmOp.getOperacaoComercial().getId());
        ps.setInt(2, materialEmOp.getMaterial().getId());
        ps.setDouble(3, materialEmOp.getQuantidadeEmKg());
        status = ps.executeUpdate();
    }catch(Exception erro){
        System.out.println(erro);
    }      
       return status;
   }
    
    
    public static List<MateriaisEmOperacaoComercial> getCatadoresBonificar() {
        List<MateriaisEmOperacaoComercial> list = new ArrayList<MateriaisEmOperacaoComercial>();
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT operacao_comercial.id_catador, materias_em_op.id_material, catador.nome as nome_catador, SUM(materias_em_op.total_em_kg) as total_vendido, material.meta_bonificacao_kg, material.valor_bonificacao FROM materias_em_op INNER JOIN operacao_comercial on id_operacao_comercial = operacao_comercial.id INNER JOIN material on materias_em_op.id_material = material.id INNER JOIN catador on operacao_comercial.id_catador = catador.id GROUP BY operacao_comercial.id_catador, materias_em_op.id_material;");
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                Material material = new Material();
                material.setId(rs.getInt("id_material"));
                material.setMetaBonificacaoKg(rs.getInt("meta_bonificacao_kg"));
                material.setValorBonificacao(rs.getInt("valor_bonificacao"));

                Catador catador = new Catador();
                catador.setId(rs.getInt("id_catador"));
                catador.setNome(rs.getString("nome_catador"));

                OperacaoComercial opComercial = new OperacaoComercial();
                opComercial.setCatador(catador);

                MateriaisEmOperacaoComercial matOp = new MateriaisEmOperacaoComercial();
                matOp.setMaterial(material);
                matOp.setOperacaoComercial(opComercial);

                int bonificacoesRecebidas = BonificacaoDao.totalBonificacaoPorCatador(catador.getId(), material.getId());
                double totalVendido = rs.getDouble("total_vendido");
                if (catador.quantidadeBonificacoesMerecidas(bonificacoesRecebidas, totalVendido, matOp.getMaterial().getMetaBonificacaoKg()) > 0) {
                    list.add(matOp);
                }
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return list;
    }
}
