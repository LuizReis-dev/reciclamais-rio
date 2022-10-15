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

    public static int inserirMaterialEmCompra(MateriaisEmOperacaoComercial materialEmOp) {
        int status = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("INSERT INTO materias_em_op(id_operacao_comercial,id_material,total_em_kg) VALUES(?,?,?)");
            ps.setInt(1, materialEmOp.getOperacaoComercial().getId());
            ps.setInt(2, materialEmOp.getMaterial().getId());
            ps.setDouble(3, materialEmOp.getQuantidadeEmKg());
            status = ps.executeUpdate();
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return status;
    }

    public static List<MateriaisEmOperacaoComercial> getCatadoresBonificar() {
        List<MateriaisEmOperacaoComercial> list = new ArrayList<MateriaisEmOperacaoComercial>();
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT operacao_comercial.id as id_operacao_comercial, operacao_comercial.id_catador, materias_em_op.id_material, catador.nome as nome_catador, SUM(materias_em_op.total_em_kg) as total_vendido, material.meta_bonificacao_kg, material.nome as nome_material ,material.valor_bonificacao FROM materias_em_op INNER JOIN operacao_comercial on id_operacao_comercial = operacao_comercial.id INNER JOIN material on materias_em_op.id_material = material.id INNER JOIN catador on operacao_comercial.id_catador = catador.id GROUP BY operacao_comercial.id_catador, materias_em_op.id_material;");
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                Material material = new Material();
                material.setId(rs.getInt("id_material"));
                material.setMetaBonificacaoKg(rs.getInt("meta_bonificacao_kg"));
                material.setValorBonificacao(rs.getInt("valor_bonificacao"));
                material.setNome(rs.getString("nome_material"));

                Catador catador = new Catador();
                catador.setId(rs.getInt("id_catador"));
                catador.setNome(rs.getString("nome_catador"));

                OperacaoComercial opComercial = new OperacaoComercial();
                opComercial.setId(rs.getInt("id_operacao_comercial"));
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

    public static double totalVendidoPorMaterialECatador(int idCatador, int idMaterial) {
        double totalVendido = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT SUM(materias_em_op.total_em_kg) as total_vendido FROM materias_em_op INNER JOIN operacao_comercial on materias_em_op.id_operacao_comercial = operacao_comercial.id WHERE id_material = ? AND id_catador = ?");
            ps.setInt(1, idMaterial);
            ps.setInt(2, idCatador);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                totalVendido = rs.getDouble("total_vendido");
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return totalVendido;
    }

    public static int ultimaTransacaoPorCatadorEMaterial(int idCatador, int idMaterial) {
        int idMatEmOp = 0;
        try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT materias_em_op.id FROM materias_em_op INNER JOIN operacao_comercial on operacao_comercial.id = materias_em_op.id_operacao_comercial WHERE operacao_comercial.id_catador = ? AND  materias_em_op.id_material = ? ORDER BY materias_em_op.id DESC LIMIT 1;");
            ps.setInt(1, idCatador);
            ps.setInt(2, idMaterial);

            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                idMatEmOp = rs.getInt("id");
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return idMatEmOp;
    }
    
    public static List<MateriaisEmOperacaoComercial> materiaisMaisVendidos(){
        List<MateriaisEmOperacaoComercial> list = new ArrayList<MateriaisEmOperacaoComercial>();
         try {
            Connection con = ConnectionDao.getConnection();
            PreparedStatement ps = (PreparedStatement) con.prepareStatement("SELECT SUM(total_em_kg) as total_em_kg, id_material, material.nome FROM materias_em_op INNER JOIN material on material.id = materias_em_op.id_material GROUP BY id_material;"); 

            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
               Material material = new Material();
               material.setNome(rs.getString("nome"));
               
                MateriaisEmOperacaoComercial matop = new MateriaisEmOperacaoComercial();
                matop.setQuantidadeEmKg(rs.getDouble("total_em_kg"));
                matop.setMaterial(material);
                list.add(matop);
            }
        } catch (Exception erro) {
            System.out.println(erro);
        }
        return list;
    } 
}
